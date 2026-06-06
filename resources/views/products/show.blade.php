@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>{{ $product->name_en }}</h2>
        <div>
            @if(!$product->deleted_at)
                <form method="POST" action="{{ route('product.hide', $product->gtin) }}" class="d-inline">
                    @csrf
                    <button class="btn btn-warning" onclick="return confirm('Hide this product?')">Hide</button>
                </form>
            @endif
            <a href="{{ route('product.index') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>

    @if($product->deleted_at)
        <div class="alert alert-warning">This product is hidden</div>
    @endif

    <form method="POST" action="{{ route('product.update', $product->gtin) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <div class="mb-2">
            <label>Company</label>
            <select name="company_id" class="form-select">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $product->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col mb-2"><input name="name_en" class="form-control" value="{{ $product->name_en }}"></div>
            <div class="col mb-2"><input name="name_fr" class="form-control" value="{{ $product->name_fr }}"></div>
        </div>
        <div class="mb-2"><input name="gtin" class="form-control" value="{{ $product->gtin }}"></div>
        <div class="row">
            <div class="col mb-2"><textarea name="description_en" class="form-control">{{ $product->description_en }}</textarea></div>
            <div class="col mb-2"><textarea name="description_fr" class="form-control">{{ $product->description_fr }}</textarea></div>
        </div>
        <div class="row">
            <div class="col mb-2"><input name="brand" class="form-control" value="{{ $product->brand }}"></div>
            <div class="col mb-2"><input name="country_of_origin" class="form-control" value="{{ $product->country_of_origin }}"></div>
        </div>
        <div class="row">
            <div class="col mb-2"><input name="gross_weight" class="form-control" value="{{ $product->gross_weight }}"></div>
            <div class="col mb-2"><input name="net_weight" class="form-control" value="{{ $product->net_weight }}"></div>
            <div class="col mb-2"><input name="weight_unit" class="form-control" value="{{ $product->weight_unit }}"></div>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" height="100" class="mb-2 d-block">
                <div class="form-check mb-2">
                    <input type="checkbox" name="remove_image" class="form-check-input" id="removeImg">
                    <label class="form-check-label" for="removeImg">Remove image</label>
                </div>
            @else
                <img src="https://placehold.co/100x100" height="100" class="mb-2 d-block">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
