@extends('admin.layout')
@section('title', 'Home Page')
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="card">
            <div class="card-header" style="background-color: mintcream">
                <h2 align="center" style="font-weight: bold">Selamat Datang {{ auth()->user()->nama }}</h2>
            </div>
            <div class="card-body">
                <div style="width: 700px; height:500px">
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@stop

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($nama),
                datasets: [{
                    label: '# Total Close',
                    data: @json($total),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
