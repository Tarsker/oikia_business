@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Crear Nueva Cita</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointments.store', $company->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="branch_id">Sucursal</label>
            <select class="form-control" id="branch_id" name="branch_id" required>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="worker_id">Trabajador</label>
            <select class="form-control" id="worker_id" name="worker_id" required>
                @foreach($workers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Hora</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Cita</button>
    </form>
</div>
@endsection
