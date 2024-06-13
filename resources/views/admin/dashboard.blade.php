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
                <div style="width: 700px; height:350px; margin-bottom: 0">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="table-responsive" style="margin-top: 0">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead style="background-color: red">
                            <tr style="color: white">
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>perusahaan</th>
                                <th>Kordinator</th>
                                <th>Manajer</th>
                                <th>Summery Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $no => $dt)
                                @php
                                    $totalTiket = \App\Models\Ticket::where('agent_id', $dt->id)
                                        ->get()
                                        ->count();
                                @endphp
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $dt->nama_depan . ' ' . $dt->nama_belakang }}</td>
                                    <td>{{ $dt->nik }}</td>
                                    <td>{{ $dt->email }}</td>
                                    <td>{{ $dt->perusahaan }}</td>
                                    <td>{{ $dt->user->nama }}</td>
                                    <td>{{ $dt->user->nama }}</td>
                                    <td>{{ $totalTiket }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
