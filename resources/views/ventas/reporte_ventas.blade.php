@extends('layouts.app')

@section('title', 'Reporte Ventas')

@section('content')

    <h1 class="text-center pt-5">Reporte de ventas</h1>

    <div id="chart_div" style="width: 100%; height: 500px;"></div>

    <div class="d-flex justify-content-center">
        <a href="/ventas/pdf/pdf_venta_global/" class="btn btn btn-outline-primary border-3 me-2">Reporte de
            ventas acumuladas</a>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Día', 'Ingreso'],
                <?php echo $data; ?>
            ]);

            var options = {
                title: 'Reporte diario de ventas',
                hAxis: {
                    title: 'Día',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
