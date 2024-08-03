@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cita</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="worker_id">Trabajador</label>
            <select name="worker_id" id="worker_id" class="form-control">
                @foreach($workers as $worker)
                    <option value="{{ $worker->id }}" {{ $appointment->worker_id == $worker->id ? 'selected' : '' }}>
                        {{ $worker->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="appointment_date">Fecha de la Cita</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" value="{{ $appointment->appointment_date->format('Y-m-d\TH:i') }}">
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmado</option>
                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Cita</button>
    </form>
</div>
@endsection
