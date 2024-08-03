<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Company $company)
    {
        $branches = Branch::where('company_id', $company->id)->get();
        return view('branches.index', compact('branches', 'company'));
    }

    public function create(Company $company)
    {
        $admins = User::where('role', 'admin')->get();
        return view('branches.create', compact('company', 'admins'));
    }

    public function store(Request $request, Company $company)
    {
        $request->validate([
            'admin_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Branch::create([
            'company_id' => $company->id,
            'admin_id' => $request->admin_id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('companies.branches.index', $company)->with('success', 'Sucursal creada correctamente.');
    }

    public function show(Company $company, Branch $branch)
    {
        return view('branches.show', compact('branch', 'company'));
    }

    public function edit(Company $company, Branch $branch)
    {
        $admins = User::where('role', 'admin')->get();
        return view('branches.edit', compact('branch', 'company', 'admins'));
    }

    public function update(Request $request, Company $company, Branch $branch)
    {
        $request->validate([
            'admin_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $branch->update([
            'admin_id' => $request->admin_id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('companies.branches.index', $company)->with('success', 'Sucursal actualizada correctamente.');
    }

    public function destroy(Company $company, Branch $branch)
    {
        $branch->delete();

        return redirect()->route('companies.branches.index', $company)->with('success', 'Sucursal eliminada correctamente.');
    }
}
