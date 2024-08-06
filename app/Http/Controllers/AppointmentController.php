<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Branch;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Company $company, Branch $branch)
    {
        $appointments = Appointment::where('branch_id', $branch->id)->get();
        return view('appointments.index', compact('appointments', 'branch', 'company'));
    }

    public function create(Company $company, Branch $branch)
    {
        $products = Product::where('company_id', $branch->company_id)->get();
        $workers = User::where('company_id', $branch->company_id)->where('role', 'worker')->get();
        return view('appointments.create', compact('branch', 'products', 'workers', 'company'));
    }

    public function store(Request $request, Company $company, Branch $branch)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'worker_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        Appointment::create([
            'description' => $request->description,
            'appointment_date' => $request->appointment_date,
            'branch_id' => $branch->id,
            'worker_id' => $request->worker_id,
            'product_id' => $request->product_id,
            'company_id' => $branch->company_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('companies.appointments.index', ['company' => $company->id, 'branch' => $branch->id])->with('success', 'Cita creada correctamente.');
    }
}
