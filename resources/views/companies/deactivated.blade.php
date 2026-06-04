@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Deactivated Companies</h2>
        <a href="{{route('company.index')}}" class="btn btn-secondary">Back</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{ $company->telephone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
