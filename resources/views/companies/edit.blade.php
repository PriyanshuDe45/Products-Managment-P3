@extends('layouts.app')
@section('content')
    <h2 class="mb-3">Edit {{ $company->name }}</h2>
    <form method="POST" action="{{ route('company.update', $company) }}">
        @csrf @method('PUT')
        @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

        <h5>Company</h5>
        <input name="name" class="form-control mb-2" value="{{ $company->name }}">
        <textarea name="address" class="form-control mb-2">{{ $company->address }}</textarea>
        <input name="telephone" class="form-control mb-2" value="{{ $company->telephone }}">
        <input name="email" class="form-control mb-3" value="{{ $company->email }}">

        <h5>Owner</h5>
        <input name="owner_name" class="form-control mb-2" value="{{ $company->owner->name }}">
        <input name="owner_mobile" class="form-control mb-2" value="{{ $company->owner->mobile }}">
        <input name="owner_email" class="form-control mb-3" value="{{ $company->owner->email }}">

        <h5>Contact</h5>
        <input name="contact_name" class="form-control mb-2" value="{{ $company->contact->name }}">
        <input name="contact_mobile" class="form-control mb-2" value="{{ $company->contact->mobile }}">
        <input name="contact_email" class="form-control mb-3" value="{{ $company->contact->email }}">

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('company.show', $company) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
