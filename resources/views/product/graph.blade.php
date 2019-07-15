@extends('layouts.template')
@section('content')

<div class="container">
    <a href="/product" class=" mt-3 btn btn-primary mb-3">Back</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Grafik Barang yang Sudah Dibeli</h5>
                </div>
                <div class="card-body">
                    <canvas id="sudahbeli"></canvas>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Grafik Barang yang Belum Dibeli</h5>
                </div>
                <div class="card-body">
                    <canvas id="belumbeli"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://www.chartjs.org/dist/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript" src="http://www.chartjs.org/samples/latest/utils.js"></script>

<script type="text/javascript">
    var color1 = Chart.helpers.color;
    var barChartData1 = {
        labels: <?php echo $labelBeli; ?>,
        datasets: [{
            label: 'Produk Per Kategori',
            backgroundColor: color1(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: <?php echo $dataBeli; ?>,
        }],
    };

    var color = Chart.helpers.color;
    var barChartData = {
        labels: <?php echo $labelBelomBeli; ?>,
        datasets: [{
            label: 'Produk Per Kategori',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: <?php echo $dataBelomBeli; ?>,
        }],
    };

    window.onload = function() {
        var ctx1 = document.getElementById('sudahbeli').getContext('2d');
        window.myBar = new Chart(ctx1, {
            type: 'bar',
            data: barChartData1,
            options: {
                responsive: true,
                legend: {
                    position: top
                },
                title: {
                    display: true,
                    text: 'Grafik data produk'
                }
            }
        });

        var ctx = document.getElementById('belumbeli').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: top
                },
                title: {
                    display: true,
                    text: 'Grafik data produk'
                }
            }
        });
    };
</script>

@endsection