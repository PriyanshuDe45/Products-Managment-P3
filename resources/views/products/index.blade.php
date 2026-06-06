@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Products</h2>
        <div>
            <a href="{{route('product.create')}}" class="btn btn-primary">New Product</a>
        </div>
    </div>
    <h5>Visible</h5>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>GTIN</th>
            <th>Description</th>
            <th>Brand Name</th>
            <th>Company</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products->whereNull('deleted_at') as $product)
            <tr>
                <td>{{$product->name_en}}</td>
                <td>{{$product->gtin}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->company->name}}</td>
                <td><a href="{{route('product.show',$product->gtin)}}" class="btn btn-sm btn-info "> Manage</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Products</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <h5>Hidden</h5>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>GTIN</th>
            <th>Description</th>
            <th>Brand Name</th>
            <th>Company</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products->whereNotNull('deleted_at') as $product)
            <tr>
                <td>{{$product->name_en}}</td>
                <td>{{$product->gtin}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->company->name}}</td>
                <td><a href="{{route('product.show',$product->gtin)}}" class="btn btn-sm btn-info ">
                        <form method="POST" action="{{route('product.destroy', $product->gtin)}}"  class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Permanently Delete')">Delete</button>
                        </form>
                    </a></td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hidden Products</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
