<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function index(Company $company)
    {
        $workers = User::where('role', 'worker')->where('company_id', $company->id)->get();
        return view('workers.index', compact('workers', 'company'));
    }

    public function create(Company $company)
    {
        return view('workers.create', compact('company'));
    }

    public function store(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $worker = new User();
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->password = Hash::make($request->password);
        $worker->role = 'worker';
        $worker->company_id = $company->id; // Asignar el ID de la empresa
        $worker->save();

        return redirect()->route('workers.index', ['company' => $company->id])->with('success', 'Trabajador creado correctamente.');
    }

    public function show(Company $company, User $worker)
    {
        return view('workers.show', compact('worker', 'company'));
    }

    public function edit(Company $company, User $worker)
    {
        return view('workers.edit', compact('worker', 'company'));
    }

    public function update(Request $request, Company $company, User $worker)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $worker->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $worker->name = $request->name;
        $worker->email = $request->email;
        if ($request->password) {
            $worker->password = Hash::make($request->password);
        }
        $worker->role = 'worker';
        $worker->save();

        return redirect()->route('workers.index', ['company' => $company->id])->with('success', 'Trabajador actualizado correctamente.');
    }

    public function destroy(Company $company, User $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index', ['company' => $company->id])->with('success', 'Trabajador eliminado correctamente.');
    }
}
