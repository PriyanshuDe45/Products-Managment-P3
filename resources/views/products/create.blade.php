@extends('layouts.app')
@section('content')
    <div class="vstack align-items-center gap-4">
        <h1 class="fw-bold">Product Create</h1>
        <form action="{{route('product.store')}}" enctype="multipart/form-data" method="post" class="list-item d-flex flex-column col-5 gap-3">
            <div class="col-7">
                <label for="company_id" class="form-label">Company <span class="text-danger">*</span></label>
                <select name="company_id" class="form-select form-select-lg" id="company_id" required>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-7">
                <label for="GTIN" class="form-label">GTIN <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your gtin here" required name="GTIN" id="GTIN">
            </div>

            <div class="col-7">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your gtin here" required name="name" id="name">
            </div>

            <div class="col-7">
                <label for="name_fr" class="form-label">Name Fr <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your gtin here" required name="name_fr" id="name_fr">
            </div>

            <div>
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control form-control-lg" placeholder="please enter your description here" required cols="30" rows="10"></textarea>
            </div>

            <div>
                <label for="description_fr" class="form-label">Description Fr <span class="text-danger">*</span></label>
                <textarea name="description_fr" id="description_fr" class="form-control form-control-lg" placeholder="please enter your description fr here" required cols="30" rows="10"></textarea>
            </div>

            <div class="col-8">
                <label for="brand" class="form-label">Brand <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your brand here" required name="brand" id="brand">
            </div>

            <div class="col-10">
                <label for="country_of_origin" class="form-label">Country Of Origin <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your country of origin here" required name="country_of_origin" id="country_of_origin">
            </div>

            <div class="col-5">
                <label for="gross_weight" class="form-label">Gross Weight <span class="text-danger">*</span></label>
                <input type="number" value="0.1" step="0.1" min="0.1" class="form-control form-control-lg" placeholder="please enter your gross weight here" required name="gross_weight" id="gross_weight">
            </div>

            <div class="col-5">
                <label for="net_content_weight" class="form-label">Net Content Weight <span class="text-danger">*</span></label>
                <input type="number" value="0.1" step="0.1" min="0.1" class="form-control form-control-lg" placeholder="please enter your net content weight here" required name="net_content_weight" id="net_content_weight">
            </div>
            <div class="col-9">
                <label for="weight_unit" class="form-label">Weight Unit <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="please enter your weight unit here" required name="weight_unit" id="weight_unit">
            </div>

            <div>
                <label for="image_path" class="form-label">Image</label>
                <input type="file" class="form-control form-control-lg" placeholder="please enter your gtin here" name="image_path" id="image_path">
            </div>
            <button class="btn btn-lg bg-gradient ms-auto btn-success mt-3">Create</button>
        </form>
    </div>
@endsection
