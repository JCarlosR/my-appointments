@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12 mb-4">
      <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              Bienvenido! Por favor selecciona una opción del menú lateral izquierdo.
          </div>
      </div>
  </div>

  @if (auth()->user()->role == 'admin')
    <div class="col-xl-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase ls-1 mb-1">Notificación general</h6>
              <h2 class="mb-0">Enviar a todos los usuarios</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
        @if (session('notification'))
          <div class="alert alert-success" role="alert">
            {{ session('notification') }}
          </div>
        @endif

          <form action="{{ url('/fcm/send') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="title">Título</label>
              <input value="{{ config('app.name') }}" type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
              <label for="body">Mensaje</label>
              <textarea name="body" id="body" rows="2" class="form-control" required></textarea>
            </div>
            <button class="btn btn-primary">Enviar notificación</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Total de citas</h6>
              <h2 class="mb-0">Según día de la semana</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <canvas id="chart-orders" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

@section('scripts')
  <script>
    const appointmentsByDay = @json($appointmentsByDay);
  </script>
  <script src="{{ asset('js/charts/home.js') }}"></script>
@endsection
