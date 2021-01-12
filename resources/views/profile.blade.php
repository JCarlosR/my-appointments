@extends('layouts.panel')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Modificar datos de usuario</h3>
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

      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          {{ session('notification') }}
        </div>
      @endif

      <form action="{{ url('profile') }}" method="post">
        @csrf
        
        <div class="form-group">
          <label for="name">Nombre completo</label>
          <input name="name" value="{{ old('name', $user->name) }}" id="name" type="text" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="phone">Número de teléfono</label>
          <input name="phone" value="{{ old('phone', $user->phone) }}" id="phone" type="text" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="address">Dirección</label>
          <input name="address" value="{{ old('address', $user->address) }}" id="address" type="text" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
          Guardar cambios
        </button>
      </form>
    </div>
  </div>
@endsection
