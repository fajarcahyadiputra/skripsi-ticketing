<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="aplikasi bengkel shop">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="author" content="">
    <link href="{{ URL::asset('foto/logo.png') }}" rel="icon">
    <title>Login Page</title>
    <link href="{{ URL::asset('assets/ruangAdmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/ruangAdmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/ruangAdmin/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<style>
    .bg-login-image {
        background: url({{ URL::asset('foto/background.jpg') }});
        background-position: center;
        background-size: cover;
        /* widtth: 1oo% */
    }
</style>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="height: 600px">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                {{-- <img src="{{ URL::asset('foto/background.jpg') }}" alt="background"> --}}
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                        @if (session()->has('pesan'))
                                            <div class="alert alert-danger text-center mb-4">{{ session('pesan') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form class="user" action="{{ route('aksi_login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nik" class="form-control"
                                                id="exampleInputnik" aria-describedby="nikHelp"
                                                placeholder="Enter nik Address">
                                            @error('nik')
                                                <div class="text-danger text-sm" style="color: white">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="text-danger text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <hr>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Login Content -->

</body>

</html>
