@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empresas</h1>

    <a href="{{ route('companies.create') }}" class="btn btn-primary">Crear Nueva Empresa</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline-block;">
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
