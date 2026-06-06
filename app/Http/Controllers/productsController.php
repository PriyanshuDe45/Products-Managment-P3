<?php

namespace App\Http\Controllers;

use App\Http\Resources\productsResource;
use App\Models\Company;
use App\Models\Product;
use App\Models\products;
use Illuminate\Http\Request;


class productsController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->with(['company'])->get();
        return view('products.index',compact('products'));
    }

    public function create(){
        $companies = Company::where('is_active', true)->get();
        return view('products.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gtin' => ['required','regex:/^\d{13,14}$/','unique:products,gtin'],
        ]);
        $imagePath = null;
        if($request->hasfile('image')){
            $imagePath = $request->file('image')->store('products','public');
        }
        Product::create([
            'company_id'       => $request->company_id,
            'name_en'          => $request->name_en,
            'name_fr'          => $request->name_fr,
            'gtin'             => $request->gtin,
            'description_en'   => $request->description_en,
            'description_fr'   => $request->description_fr,
            'brand'            => $request->brand,
            'country_of_origin'=> $request->country_of_origin,
            'gross_weight'     => $request->gross_weight,
            'net_weight'       => $request->net_weight,
            'weight_unit'      => $request->weight_unit,
            'image_path'       => $imagePath,
        ]);
        return redirect()->route('product.index')->with('success', 'Product created');
    }


    public function show($gtin)
    {
        $product = Product::withTrashed()->where('gtin', $gtin)->firstOrFail();
        $companies = Company::where('is_active', true)->get();
        return view('products.show', compact('product', 'companies'));
    }

    public function update(Request $request,$gtin)
    {
      $product = Product::withTrashed()->where('gtin',$gtin)->firstOrFail();
      $request->validate([
          'gtin' => ['required','regex:/^\d{13,14}$/'],
      ]);
      if($request->hasfile('image')){
          $imagePath = $request->file('image')->store('products','public');
          $product->image_path = $imagePath;
      }
      if($request->remove_image){
          $product->image_path = null;
      }

      $product->update([
          'name_en' => $request->name_en,
          'name_fr' => $request->name_fr,
          'gtin' => $request->gtin,
          'description_en' => $request->description_en,
          'description_fr' => $request->description_fr,
          'brand' => $request->brand,
          'country_of_origin' => $request->country_of_origin,
          'net_weight' => $request->net_weight,
          'weight_unit' => $request->weight_unit,
          'image_path' => $product->image_path,
      ]);

      return redirect()->route('product.index')->with('success', 'Product updated');

    }

    public function hide($gtin){
        $product = Product::withTrashed()->where('gtin',$gtin)->firstOrFail();
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product hidden');
    }

    public function destroy($gtin)
    {
        $product = Product::onlyTrashed()->where('gtin',$gtin)->firstOrFail();
        $product->forceDelete();
        return redirect()->route('product.index')->with('success', 'Product deleted');
    }

    public function apiIndex(Request $request){

        $query = Product::with(['company.owner','company.contact'])->whereNull('deleted_at');

        if ($request->get('query')) {
            $q = $request->get('query');
            $query->where(function($q2) use ($q) {
                $q2->where('name_en', 'like', "%$q%")
                    ->orWhere('name_fr', 'like', "%$q%")
                    ->orWhere('description_en', 'like', "%$q%")
                    ->orWhere('description_fr', 'like', "%$q%");
            });
        }

        $products = $query->paginate(10);

        return response()->json([
            'data' => productsResource::collection($products),
            'pagination' => [
                'current_page' => $products->currentPage(),
                'total_pages' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'next_page_url' => $products->nextPageUrl(),
                'prev_page_url' => $products->previousPageUrl(),
            ]
        ]);
    }

    public function apiShow($gtin){
        $product = Product::with(['company.owner','company.contact'])
            ->whereNull('deleted_at')
            ->where('gtin',$gtin)
            ->first();

        if(!$product){
            return response()->json(['message'=>'Not Found'],404);
        }
        return new productsResource($product);
    }


    public function verifyForm(){
        return view('products.verify');
    }

    public function verify(Request $request){
        $lines = explode("\n", $request->gtins);
        $results = [];
        $allValid = true;

        foreach($lines as $line){
            $gtin = trim($line);
            if($gtin === '')continue;

            $valid = Product::whereNull('deleted_at')->where('gtin',$gtin)->exists();

            if(!$valid){
                $allValid = false;
            }

            $results[]= ['gtin' => $gtin, 'valid' => $valid];
        }

        return view('products.verify', compact('results','allValid'));
    }


    public function publicShow(Request $request, $gtin){
        $product = Product::with(['company'])->whereNull('deleted_at')->where('gtin',$gtin)->firstOrFail();

        $lang = $request->get('lang','en');
        return view('products.public', compact('product','lang'));
    }
}
