<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $company = Company::create([
            'name' => $request->name,
        ]);

        return redirect()->route('companies.index')->with('success', 'Empresa creada correctamente.');
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $company->update([
            'name' => $request->name,
        ]);

        return redirect()->route('companies.index')->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Empresa eliminada correctamente.');
    }
}
