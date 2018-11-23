@extends('layouts.panel')

@section('content')
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Reporte: Médicos más activos</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="input-daterange datepicker row align-items-center"
        data-date-format="yyyy-mm-dd">
          <div class="col">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" id="startDate"
                        placeholder="Fecha de inicio" type="text" value="{{ $start }}">
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="form-group">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control" id="endDate"
                        placeholder="Fecha de fin" type="text" value="{{ $end }}">
                  </div>
              </div>
          </div>
      </div>
      <div id="container"></div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="{{ asset('js/charts/doctors.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection