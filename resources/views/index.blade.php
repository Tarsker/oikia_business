@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Oikia Business</h1>
    <ul class="list-unstyled">
        <li class="mt-2"><a href="{{ route('appointments.index') }}" class="btn btn-primary">Ver Citas</a></li>
        <li class="mt-2"><a href="{{ route('appointments.create') }}" class="btn btn-primary">Crear Cita</a></li>
        <li class="mt-2"><a href="{{ route('workers.index') }}" class="btn btn-primary">Ver Trabajadores</a></li>
        <li class="mt-2"><a href="{{ route('workers.create') }}" class="btn btn-primary">Crear Trabajador</a></li>
        <li class="mt-2"><a href="{{ route('branches.index') }}" class="btn btn-primary">Ver Sucursales</a></li>
        <li class="mt-2"><a href="{{ route('branches.create') }}" class="btn btn-primary">Crear Sucursal</a></li>
        <li class="mt-2"><a href="{{ route('companies.index') }}" class="btn btn-primary">Ver Empresas</a></li>
        <li class="mt-2"><a href="{{ route('companies.create') }}" class="btn btn-primary">Crear Empresa</a></li>
    </ul>
</div>
@endsection
