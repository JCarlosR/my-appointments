@extends('layouts.panel')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar paciente</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('patients') }}" class="btn btn-sm btn-default">
            Cancelar y volver
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ url('patients/'.$patient->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nombre del paciente</label>
          <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" name="email" class="form-control" value="{{ old('email', $patient->email) }}">
        </div>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" name="dni" class="form-control" value="{{ old('dni', $patient->dni) }}">
        </div>
        <div class="form-group">
          <label for="address">Dirección</label>
          <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}">
        </div>
        <div class="form-group">
          <label for="phone">Teléfono / móvil</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="text" name="password" class="form-control" value="">
          <p>Ingrese un valor sólo si desea modificar la contraseña.</p>
        </div>
        <button type="submit" class="btn btn-primary">
          Guardar
        </button>
      </form>
    </div>
  </div>
@endsection
