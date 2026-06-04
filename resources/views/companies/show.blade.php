@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>{{ $company->name }}</h2>
        <div>
            <a href="{{ route('company.edit', $company) }}" class="btn btn-warning me-2">Edit</a>
            @if($company->is_active)
                <form method="POST" action="{{ route('company.deactivate', $company) }}" class="d-inline">
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Deactivate?')">Deactivate</button>
                </form>
            @endif
        </div>
    </div>

    <p><strong>Address:</strong> {{ $company->address }}</p>
    <p><strong>Telephone:</strong> {{ $company->telephone }}</p>
    <p><strong>Email:</strong> {{ $company->email }}</p>
    <p><strong>Status:</strong> {{ $company->is_active ? 'Active' : 'Deactivated' }}</p>

    <h5 class="mt-3">Owner</h5>
    <p>{{ $company->owner->name }} — {{ $company->owner->mobile }} — {{ $company->owner->email }}</p>

    <h5>Contact</h5>
    <p>{{ $company->contact->name }} — {{ $company->contact->mobile }} — {{ $company->contact->email }}</p>

    <h5 class="mt-3">Products</h5>
    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>GTIN</th><th>Status</th></tr></thead>
        <tbody>
        @forelse($company->products as $product)
            <tr>
                <td>{{ $product->name_en }}</td>
                <td>{{ $product->gtin }}</td>
                <td>{{ $product->deleted_at ? 'Hidden' : 'Visible' }}</td>
            </tr>
        @empty
            <tr><td colspan="3">No products</td></tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('company.index') }}" class="btn btn-secondary mt-2">Back</a>
@endsection
