<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::where('role', 'worker')->get();
        return view('workers.index', compact('workers'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(Request $request)
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
        $worker->role = 'worker'; // Asegúrate de asignar el rol 'worker'
        $worker->save();

        return redirect()->route('workers.index')->with('success', 'Trabajador creado correctamente.');
    }

    public function show(User $worker)
    {
        return view('workers.show', compact('worker'));
    }

    public function edit(User $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    public function update(Request $request, User $worker)
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
        $worker->role = 'worker'; // Asegúrate de mantener el rol 'worker'
        $worker->save();

        return redirect()->route('workers.index')->with('success', 'Trabajador actualizado correctamente.');
    }

    public function destroy(User $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('success', 'Trabajador eliminado correctamente.');
    }
}
