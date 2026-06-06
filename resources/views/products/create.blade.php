@extends('layouts.app')
@section('content')
    <h2 class="mb-3">New Product</h2>
    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <div class="mb-2">
            <label>Company</label>
            <select name="company_id" class="form-select">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col mb-2"><input name="name_en" class="form-control" placeholder="Name (EN)"></div>
            <div class="col mb-2"><input name="name_fr" class="form-control" placeholder="Name (FR)"></div>
        </div>
        <div class="mb-2"><input name="gtin" class="form-control" placeholder="GTIN 13-14 digits"></div>
        <div class="row">
            <div class="col mb-2"><input name="description_en" class="form-control" placeholder="Description (EN)">
            </div>
            <div class="col mb-2"><input name="description_fr" class="form-control" placeholder="Description (FR)">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2"><input name="brand" class="form-control" placeholder="Brand"></div>
            <div class="col mb-2"><input name="country_of_origin" class="form-control" placeholder="Country of Origin">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2"><input name="gross_weight" class="form-control" placeholder="Gross Weight"></div>
            <div class="col mb-2"><input name="net_weight" class="form-control" placeholder="Net Weight"></div>
            <div class="col mb-2"><input name="weight_unit" class="form-control" placeholder="Weight Unit"></div>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
