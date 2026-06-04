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
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function store(Request $request)
    {
        $product = products::create($request->only('name_en','name_fr', 'gtin', 'description_en','description_fr','brand','country_of_origin','gross_weight','net_weight','weight_unit','image_path'));

        return redirect()->route('product.index')->with('success', 'Product created');
    }
    public function create(){
        $companies = Company::all();
        return view('products.create', compact('companies'));
    }

    public function show(products $products)
    {
        return new productsResource($products);
    }

    public function update(Request $request, products $products)
    {
        $data = $request->validate([
            'companies_id' => ['required', 'exists:companies'],
            'name' => ['required'],
            'name_fr' => ['required'],
            'desc' => ['nullable'],
            'desc_fr' => ['nullable'],
            'brand' => ['nullable'],
            'country' => ['nullable'],
            'gross' => ['nullable', 'decimal:2'],
            'net' => ['nullable', 'decimal:2'],
            'weight' => ['nullable'],
            'gtin' => ['required'],
            'image_path' => ['nullable'],
        ]);

        $products->update($data);

        return new productsResource($products);
    }

    public function destroy(products $products)
    {
        $products->delete();

        return response()->json();
    }
}
