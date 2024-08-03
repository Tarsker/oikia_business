@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Sucursal</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select class="form-control" id="company_id" name="company_id" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="admin_id">Administrador</label>
            <select class="form-control" id="admin_id" name="admin_id" required>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
