<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Company $company)
    {
        $branches = $company->branches;
        return view('branches.index', compact('company', 'branches'));
    }

    public function create(Company $company)
    {
        $admins = User::where('role', 'admin')->where('company_id', $company->id)->get();
        return view('branches.create', compact('company', 'admins'));
    }

    public function store(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'admin_id' => 'required|exists:users,id',
            'email' => 'required|string|email|max:255',
        ]);

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->admin_id = $request->admin_id;
        $branch->email = $request->email;
        $branch->company_id = $company->id;
        $branch->save();

        return redirect()->route('companies.branches.index', $company->id)->with('success', 'Sucursal creada exitosamente.');
    }

    public function show(Company $company, Branch $branch)
    {
        $appointments = Appointment::where('branch_id', $branch->id)->get();
        $workers = User::where('role', 'worker')->where('branch_id', $branch->id)->get();
        return view('branches.show', compact('company', 'branch', 'appointments', 'workers'));
    }

    public function edit(Company $company, Branch $branch)
    {
        $admins = User::where('role', 'admin')->where('company_id', $company->id)->get();
        return view('branches.edit', compact('company', 'branch', 'admins'));
    }

    public function update(Request $request, Company $company, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'admin_id' => 'required|exists:users,id',
            'email' => 'required|string|email|max:255',
        ]);

        $branch->name = $request->name;
        $branch->admin_id = $request->admin_id;
        $branch->email = $request->email;
        $branch->save();

        return redirect()->route('companies.branches.index', $company->id)->with('success', 'Sucursal actualizada exitosamente.');
    }

    public function destroy(Company $company, Branch $branch)
    {
        $branch->delete();
        return redirect()->route('companies.branches.index', $company->id)->with('success', 'Sucursal eliminada exitosamente.');
    }
}
