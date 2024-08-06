@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>

    <div class="mb-4">
        <a href="{{ route('companies.branches.index', $company->id) }}" class="btn btn-primary">Gestionar Sedes</a>
        <a href="{{ route('companies.appointments.index', $company->id) }}" class="btn btn-secondary">Gestionar Citas</a>
        <a href="{{ route('companies.workers.index', $company->id) }}" class="btn btn-secondary">Gestionar Empleados</a>
    </div>
    
    <!-- Más detalles de la empresa pueden ir aquí -->
</div>
@endsection
