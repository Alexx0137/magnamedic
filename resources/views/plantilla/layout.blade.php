<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Magnamedic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/favicon.ico') }}">
</head>

<body>
<div id="wrapper">
    <div class="sidebar">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('storage/images/magnamedic_gray.png') }}" alt="Logo de Mi Empresa">
            </a>
            <hr>
        </div>
        <ul>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <i class="fas fa-fw fa-home"></i>
                <a href="/"><span>Inicio</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('citas-medicas*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-calendar"></i>
                <a href="{{ route('citas-medicas') }}"><span>Citas médicas</span></a>
            </li>
            <li class="{{ request()->is('pacientes*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-users"></i>
                <a href="{{ route('pacientes') }}"><span>Pacientes</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('medicos*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-stethoscope"></i>
                <a href="{{ route('medicos') }}"><span>Médicos</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('reportes*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <a href="{{ route('reportes') }}"><span>Reportes</span></a>
            </li>
            <li class="{{ request()->is('configuracion') ? 'active' : '' }}">
                <i class="fas fa-fw fa-cogs"></i>
                <a href="{{ route('configuracion') }}"><span>Configuración</span></a>
            </li>
        </ul>
    </div>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <header>
                <nav class="dashboard-navbar">
                    <div class="user-profile">
                        <span>Nelson García</span>
                        <a href="/login">
                            <img src="{{ asset('storage/images/undraw_profile.svg') }}" alt="Tu imagen de usuario">
                        </a>
                    </div>
                </nav>
            </header>


            <main>
                <!-- inicio contenido principal -->
                <div class="container-fluid">

                    <!-- Titulo página -->
                    <div class="title-container">
                        @yield('title')
                    </div>

                    <!-- Datos del contenido -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @yield('card-header')
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <footer class="footer">
            <span>Copyright &copy; Magnamedic 2023</span>
        </footer>
    </div>
</div>

</body>
</html>
