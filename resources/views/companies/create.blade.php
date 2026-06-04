@extends('layouts.app')
@section('content')
<h2 class="mb-3">New Company</h2>
<form method="POST" action="{{route('company.store')}}">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">{{$errors->first()}}</div>
    @endif

    <h5>Company</h5>
    <input name="name" class="form-control mb-2" placeholder="Name">
    <textarea name="address" class="form-control mb-2" placeholder="Address"></textarea>
    <input type="text" name="telephone" class="form-control mb-2" placeholder="Telephone">
    <input type="email" name="email" class="form-control mb-3" placeholder="Email">

    <input type="text" name="owner_name" class="form-control mb-2" placeholder="Name">
    <input type="text" name="owner_mobile" class="form-control mb-2" placeholder="Mobile">
    <input type="email" name="owner_email" class="form-control mb-3" placeholder="Email">

    <input type="text" name="contact_name" class="form-control mb-2" placeholder="Name">
    <input type="text" name="contact_mobile" class="form-control mb-2" placeholder="Mobile">
    <input type="email" name="contact_email" class="form-control mb-3" placeholder="Email">

    <button class="btn btn-primary">Save</button>
    <a href="{{ route('company.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
