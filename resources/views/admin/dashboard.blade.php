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

            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
@stop

@section('javascript')

@stop
