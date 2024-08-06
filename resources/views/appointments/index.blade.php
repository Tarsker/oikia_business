@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Citas para {{ $branch->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('companies.appointments.create', ['company' => $company->id, 'branch' => $branch->id]) }}" class="btn btn-primary">Crear Nueva Cita</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Asesor</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->description }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->worker->name }}</td>
                    <td>{{ $appointment->product->name }}</td>
                    <td>
                        <a href="{{ route('companies.appointments.show', ['company' => $company->id, 'branch' => $branch->id, 'appointment' => $appointment->id]) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('companies.appointments.edit', ['company' => $company->id, 'branch' => $branch->id, 'appointment' => $appointment->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('companies.appointments.destroy', ['company' => $company->id, 'branch' => $branch->id, 'appointment' => $appointment->id]) }}" method="POST" style="display:inline-block;">
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
