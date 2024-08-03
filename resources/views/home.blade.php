@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Oikia Business</h1>
    <div class="d-flex flex-column">
        <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-lg my-2">Ver Citas</a>
        <a href="{{ route('appointments.create') }}" class="btn btn-success btn-lg my-2">Crear Cita</a>
        <a href="{{ route('workers.index') }}" class="btn btn-info btn-lg my-2">Ver Trabajadores</a>
        <a href="{{ route('workers.create') }}" class="btn btn-warning btn-lg my-2">Crear Trabajador</a>
    </div>
</div>
@endsection
