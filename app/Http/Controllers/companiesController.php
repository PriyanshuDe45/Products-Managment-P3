<?php

namespace App\Http\Controllers;

use App\Http\Resources\companiesResource;
use App\Models\Company;
use Illuminate\Http\Request;

class companiesController extends Controller
{
    public function index()
    {
        $companies = Company::where('is_active', true)->get();
        return view('companies.index', compact('companies'));
    }

    public function deactivated()
    {
        $companies = Company::where('is_active', false)->get();
        return view('companies.deactivated', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $company = Company::create($request->only('name', 'address', 'telephone', 'email'));

        $company->people()->createMany([
            ['type' => 'owner', 'name' => $request->owner_name, 'mobile' => $request->owner_mobile, 'email' => $request->owner_email],
            ['type' => 'contact', 'name' => $request->contact_name, 'mobile' => $request->contact_mobile, 'email' => $request->contact_email],
        ]);

        return redirect()->route('company.index')->with('success', 'Company created');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->only('name', 'address', 'telephone', 'email'));
        $company->owner()->update(['name' => $request->owner_name, 'mobile' => $request->owner_mobile, 'email' => $request->owner_email]);
        $company->contact()->update(['name' => $request->contact_name, 'mobile' => $request->contact_mobile, 'email' => $request->contact_email]);
        return redirect()->route('company.show', $company)->with('success', 'Updated');
    }

    public function deactivate(Company $company)
    {
        $company->deactivate();
        return redirect()->route('company.index')->with('success', 'Deactivated');
    }
}
