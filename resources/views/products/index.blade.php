@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Products</h2>
        <div>
{{--            <a href="{{route('products.deactivated')}}" class="btn btn-secondary me-2">Deactivated</a>--}}
            <a href="{{route('product.create')}}" class="btn btn-primary">New</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>GTIN</th>
            <th>Description</th>
            <th>Brand Name</th>
            <th>Country of Origin</th>
        </tr>
        </thead>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->gitn}}</td>
                <td>{{$product->desc}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->country}}</td>
{{--                <td><a href="{{route('product.show',$product)}}" class="btn btn-sm btn-info">View</a></td>--}}
            </tr>
        @endforeach
    </table>
@endsection
