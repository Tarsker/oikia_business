@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Trabajadores</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workers.create') }}" class="btn btn-primary">Crear Nuevo Trabajador</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workers as $worker)
                <tr>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>
                        <a href="{{ route('workers.show', $worker->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('workers.destroy', $worker->id) }}" method="POST" style="display:inline-block;">
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
