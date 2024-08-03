<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Branch; // Asegúrate de incluir el modelo Branch
use Illuminate\Http\Request;
use App\Notifications\AppointmentConfirmation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $workers = User::where('role', 'worker')->get();
        $branches = Branch::all(); // Obtener todas las sucursales
        return view('appointments.create', compact('workers', 'branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'worker_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'branch_id' => 'required|exists:branches,id' // Validar que branch_id exista
        ]);

        $appointment = new Appointment();
        $appointment->appointment_date = $request->appointment_date;
        $appointment->worker_id = $request->worker_id;
        $appointment->status = 'pending';
        $appointment->user_id = auth()->id(); // Asignar el ID del usuario autenticado
        $appointment->branch_id = $request->branch_id; // Asignar la sucursal
        $appointment->save();

        // Enviar notificación al administrador
        $this->sendAdminNotification($appointment);

        return redirect()->route('appointments.index')->with('success', 'Cita creada correctamente.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $appointment->appointment_date = \Carbon\Carbon::parse($appointment->appointment_date);
        $workers = User::where('role', 'worker')->get();
        $branches = Branch::all(); // Obtener todas las sucursales
        return view('appointments.edit', compact('appointment', 'workers', 'branches'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'worker_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'branch_id' => 'required|exists:branches,id' // Validar que branch_id exista
        ]);

        $appointment->appointment_date = $request->appointment_date;
        $appointment->worker_id = $request->worker_id;
        $appointment->branch_id = $request->branch_id; // Actualizar la sucursal
        $appointment->status = 'confirmed';
        $appointment->save();

        // Enviar notificación al usuario
        if ($appointment->user) {
            $appointment->user->notify(new AppointmentConfirmation($appointment));
        }

        return redirect()->route('appointments.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Cita eliminada correctamente.');
    }

    // Agrega esta función para enviar el correo al administrador
    public function sendAdminNotification(Appointment $appointment)
    {
        $adminEmail = env('ADMIN_EMAIL');
        Mail::to($adminEmail)->send(new AppointmentRequest($appointment));
    }
}
