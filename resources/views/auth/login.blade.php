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
            <!-- fontawesome -->
    <link href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/ruangAdmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/ruangAdmin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <style>

.login-box {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-box h2 {
  margin: 0 0 15px;
  padding: 0;
  color: #333;
  text-align: center;
  text-transform: uppercase;
}

.user-box {
  position: relative;
  margin-bottom: 30px;
}

.user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #333;
  margin-bottom: 30px;
  border: none;
  border-bottom: 2px solid #333;
  outline: none;
  background: transparent;
}

.user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #333;
  pointer-events: none;
  transition: 0.5s;
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
  transform: translateY(-20px);
  font-size: 14px;
  color: #333;
}

a {
  display: inline-block;
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  font-size: 16px;
  text-transform: uppercase;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  transition: 0.5s;
  letter-spacing: 2px;
  border-radius: 5px;
}

a:hover {
  background-color: #fff;
  color: #333;
  border: 1px solid #333;
}

a span {
  position: absolute;
  display: block;
}

a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background-color: #333;
  animation: animate1 1s linear infinite;
}

@keyframes animate1 {
  0% {
    left: -100%;
  }
  50%,
  100% {
    left: 100%;
  }
}

a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background-color: #333;
  animation: animate2 1s linear infinite;
  animation-delay: 0.25s;
}

@keyframes animate2 {
  0% {
    top: -100%;
  }
  50%,
  100% {
    top: 100%;
  }
}

a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background-color: #333;
  animation: animate3 1s linear infinite;
  animation-delay: 0.5s;
}

@keyframes animate3 {
  0% {
    right: -100%;
  }
  50%,
  100% {
    right: 100%;
  }
}

a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background-color: #333;
  animation: animate4 1s linear infinite;
  animation-delay: 0.75s;
}

@keyframes animate4 {
  0% {
    bottom: -100%;
  }
  50%,
  100% {
    bottom: 100%;
  }
}

.password-toggle-icon {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}

.password-toggle-icon i {
  font-size: 18px;
  line-height: 1;
  color: #333;
  transition: color 0.3s ease-in-out;
  margin-bottom: 20px;
}

.password-toggle-icon i:hover {
  color: #000;
}
    </style>
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
                                        <h1 class="h4 text-gray-900 mb-4">ASSURANCE</h1>
                                        @if (session()->has('pesan'))
                                            <div class="alert alert-danger text-center mb-4">{{ session('pesan') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form class="user" action="{{ route('aksi_login') }}" method="post">
                                        @csrf
                                        <div class="form-group user-box">
                                            <input type="text" name="nik" class="form-control"
                                                id="exampleInputnik" aria-describedby="nikHelp"
                                                placeholder="Enter nik Address">
                                            @error('nik')
                                                <div class="text-danger text-sm" style="color: white">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="user-box form-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <div class="text-danger text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
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
<script>
    const passwordField = document.getElementById("password");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});
</script>
</html>
