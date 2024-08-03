@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Citas</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Crear Nueva Cita</a>
    <table class="table">
        <thead>
            <tr>
                <th>Trabajador</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->worker->name ?? 'N/A' }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
