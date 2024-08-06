@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">{{ $company->name }} - {{ $branch->name }}</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Citas</h2>
            <a href="{{ route('companies.appointments.create', [$company->id, $branch->id]) }}" class="btn btn-primary mb-2">Crear Nueva Cita</a>
            <ul class="list-group">
                @foreach($appointments as $appointment)
                    <li class="list-group-item">
                        {{ $appointment->description }} - {{ $appointment->date }}
                        <a href="{{ route('companies.appointments.show', [$company->id, $branch->id, $appointment->id]) }}" class="btn btn-info">Ver</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Trabajadores</h2>
            <a href="{{ route('companies.workers.create', [$company->id, $branch->id]) }}" class="btn btn-primary mb-2">Crear Nuevo Trabajador</a>
            <ul class="list-group">
                @foreach($workers as $worker)
                    <li class="list-group-item">
                        {{ $worker->name }}
                        <a href="{{ route('companies.workers.show', [$company->id, $branch->id, $worker->id]) }}" class="btn btn-info">Ver</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
