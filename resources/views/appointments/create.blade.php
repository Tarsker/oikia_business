@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Cita</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="worker_id">Trabajador</label>
            <select class="form-control" id="worker_id" name="worker_id" required>
                @foreach($workers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('workers.create') }}" class="btn btn-link">Crear nuevo trabajador</a>
        </div>
        <div class="form-group">
            <label for="branch_id">Sucursal</label>
            <select class="form-control" id="branch_id" name="branch_id" required>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('branches.create') }}" class="btn btn-link">Crear nueva sucursal</a>
        </div>
        <div class="form-group">
            <label for="appointment_date">Fecha de la Cita</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
        </div>
        <div class="form-group">
            <label for="payment_option">Opción de Pago</label>
            <select class="form-control" id="payment_option" name="payment_option">
                <option value="online">Pagar en línea</option>
                <option value="onsite">Pagar al llegar</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
