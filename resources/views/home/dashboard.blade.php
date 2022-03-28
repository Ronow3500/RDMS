@extends('layouts.main')

@section('content')
 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <script type="text/javascript" src="{{ asset('js/charts/loader.js') }}"></script>

        @if(auth()->user())
        <div class="card card-warning">
          <div class="card-header">
            <h2 class="card-title text-light">Visualization</h2>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <img class="card-img-overlay" src="{{ asset('assets/images/logo.png') }}" alt="TIFA Logo">
            <div class="chart">
              <div id="myChart" style="max-width: 1000px; height: 400px;"></div>
            </div>
          </div>
        </div>
        @endif

        <script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Region', 'Median'],
  ['Gender',55],
  ['Age Group',49],
  ['Education Level',44],
  ['Marital Status',24],
  ['Religion',15]
]);

var options = {
  title:'Graphical Representation'
};

var chart = new google.visualization.BarChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection