<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Magnamedic - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body class="bg-white">

<div class="background-container d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-login">
                                    <div class="text-center">
                                        <div class="image-container">
                                            <img src="/assets/media/images/magnamedic(5).png" alt="Logo de Magnamedic"
                                                 class="img-fluid centered-and-resized smaller-logo mb-3" height="229"
                                                 width="498" priority/>
                                        </div>
                                        <h1 class="h4 text-gray-800 mb-0"><strong>Iniciar sesión</strong></h1>
                                    </div>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Correo</label>
                                            <input type="email"
                                                   value="{{ old('email' ) }}"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email"
                                                   placeholder="Correo"
                                                   required
                                                   autofocus
                                            >
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password"
                                                   class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   id="password"
                                                   name="password"
                                                   placeholder="Contraseña"
                                                   required
                                            >
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                    class="btn btn-primary btn-user btn-block mt-3">
                                                Iniciar sesión
                                            </button>
                                        </div>
                                    </form>

                                    <hr/>
                                    <div class="text-center">
{{--                                        <a class="small" href="#">¿Olvidaste la contraseña?</a>--}}
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 d-none d-lg-block gradient-bg d-flex align-items-center justify-content-center">
                                <div class="form-login">
                                    <div class="overlay-panel overlay-right text-white">
                                        <h1 class="welcome-title">Bienvenido a <br>
                                            Magnamedic</h1>
                                        <p class="explaining">Aquí, puedes programar, reprogramar y cancelar citas
                                            médicas fácilmente,
                                            acceder a la información de los pacientes y médicos de manera rápida y
                                            segura,
                                            consultar el historial de citas y mantener un seguimiento detallado,
                                            gestionar especialidades y horarios de los doctores,
                                            recibir notificaciones y recordatorios de citas.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
