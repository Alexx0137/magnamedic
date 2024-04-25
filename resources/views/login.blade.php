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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-white">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-11 col-md-9">
            <div class="card-login o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">

                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="card-logo-container d-flex align-items-center justify-content-center">
                                <div class="image-container">
                                    <img src="{{ asset('storage/images/magnamedic (5).png')}}" alt="Logo de Magnamedic"
                                         class="img-fluid centered-and-resized smaller-logo">
                                </div>
                                <div class="divider"></div>
                                <div class="image-container">
                                    <img src="{{ asset('storage/images/servir_salud (2).png')}}"
                                         alt="Logo de Servir Salud"
                                         class="img-fluid centered-and-resized smaller-logo">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-login">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <label for="inputEmail"></label><input type="email"
                                                                               class="form-control form-control-user"
                                                                               id="inputEmail"
                                                                               aria-describedby="emailHelp"
                                                                               placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword"></label><input type="password"
                                                                                  class="form-control form-control-user"
                                                                                  id="inputPassword"
                                                                                  placeholder="Contraseña">
                                    </div>
                                    <a href="{{ asset('/')}}" class="btn btn-primary btn-user btn-block mt">
                                        Login
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">¿Olvidaste la contraseña?</a>
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
