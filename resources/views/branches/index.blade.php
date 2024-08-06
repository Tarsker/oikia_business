@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Sedes de {{ $company->name }}</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('companies.branches.create', $company->id) }}" class="btn btn-primary">Crear Nueva Sede</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Administrador de Sede</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->admin->name }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>
                        <a href="{{ route('companies.branches.show', [$company->id, $branch->id]) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('companies.branches.edit', [$company->id, $branch->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('companies.branches.destroy', [$company->id, $branch->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('companies.appointments.index', [$company->id, $branch->id]) }}" class="btn btn-primary">Gestionar Citas</a>
                        <a href="{{ route('companies.workers.index', [$company->id, $branch->id]) }}" class="btn btn-primary">Gestionar Trabajadores</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
