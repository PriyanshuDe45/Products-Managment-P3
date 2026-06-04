<?php

namespace App\Http\Controllers;

use App\Http\Resources\productsResource;
use App\Models\products;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        return productsResource::collection(products::all());
    }

    public function store(Request $request)
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

        return new productsResource(products::create($data));
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
