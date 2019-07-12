@extends('layouts.template')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Grafik</h5>
                </div>
                <div class="card-body">
                    <canvas id="graph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script> 
<script type="text/javascript" src="http://www.chartjs.org/samples/latest/utils.js"></script> 

<script type="text/javascript">
    var color = Chart.helpers.color;
    var barChartData = {
        labels: {!! $label !!},
        datasets: [{
            label: 'Produk Per Kategori',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: {!! $data !!},
        }], 
    };

    window.onload= function(){
        var ctx = document.getElementById('graph').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend:{
                    position:top
                },
                title:{
                    display:true,
                    text:'Grafik data produk'
                }
            }
        });
    };
</script>

@endsection