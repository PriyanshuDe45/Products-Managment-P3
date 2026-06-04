@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Companies</h2>
        <div>
            <a href="{{route('company.deactivated')}}" class="btn btn-secondary me-2">Deactivated</a>
            <a href="{{route('company.create')}}" class="btn btn-primary">New</a>
        </div>
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
                <td>{{ $company->name }}</td>
                <td>{{ $company-> email}}</td>
                <td>{{ $company -> telephone }}</td>
                <td><a href="{{route('company.show',$company)}}" class="btn btn-sm btn-info">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
