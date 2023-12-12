@extends('TemplateAdmin')
@section('content')
    <figure class="highcharts-figure">
        <div id="container"></div>
        Esta grafica se hizo con el fin de tomar deciciones segun el empleado que tenga un mayor promedio en su sueldo neto
    </figure>
    <script>
        $(function() {

            data = JSON.parse('{!! $datas !!}');
            console.log(data);


            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Promedio por cliente',
                    align: 'center'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: data
                }]
            });
        });
    </script>
@endsection
