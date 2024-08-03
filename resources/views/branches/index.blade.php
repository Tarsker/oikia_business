<!-- resources/views/branches/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sedes de {{ $company->name }}</h1>

    <a href="{{ route('companies.branches.create', $company) }}" class="btn btn-primary">Crear Nueva Sede</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Administrador</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->admin->name }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>
                        <a href="{{ route('companies.branches.show', [$company, $branch]) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('companies.branches.edit', [$company, $branch]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('companies.branches.destroy', [$company, $branch]) }}" method="POST" style="display:inline-block;">
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
