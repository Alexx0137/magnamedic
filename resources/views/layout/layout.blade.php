<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Magnamedic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/favicon.ico') }}">
</head>

<body>
<div id="wrapper">
    <div class="sidebar">
        <div class="logo">
            <a href="/dashboard">
                <img src="{{ url('/assets/media/images/magnamedic(2).png') }}" alt="Logo de Mi Empresa">
            </a>
        </div>
        <ul>
            <hr>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-fw fa-home"></i>
                <a href="dashboard"><span>Inicio</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('medical-appointments*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-calendar"></i>
                <a href="{{ route('medical-appointments') }}"><span>Citas médicas</span></a>
            </li>
            <li class="{{ request()->is('patients*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-users"></i>
                <a href="{{ route('patients') }}"><span>Pacientes</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('doctors*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-stethoscope"></i>
                <a href="{{ route('doctors') }}"><span>Médicos</span></a>
            </li>
            <li class="{{ request()->is('medical-specialities*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-kit-medical"></i>
                <a href="{{ route('medical-specialities') }}"><span>Especialidad médica</span></a>
            </li>
            <hr>

            <li class="{{ request()->is('reports*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <a href="{{ route('reports') }}"><span>Reportes</span></a>
            </li>
            <li class="{{ request()->is('users*') ? 'active' : '' }}">
                <i class="fas fa-fw fa-users"></i>
                <a href="{{ route('users') }}"><span>Usuarios</span></a>
            </li>
        </ul>
    </div>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <header>
                <nav class="dashboard-navbar navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-end w-100">
                            <div class="user-profile dropdown">
                                @if (isset($user) && $user !== null)
                                    <a class="dropdown-toggle-no-arrow" href="#" role="button" id="userDropdown"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                   <span class="text-gray-600 mr-2">
                                        {{ strtoupper($user->name) }} {{ strtoupper($user->last_name) }}
                                    </span>
                                        <img src="/assets/media/images/undraw_profile.svg" alt="User Avatar"
                                             class="img-profile rounded-circle" height="32" width="32">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <!-- User info section -->
                                        <a class="drop-info d-flex align-items-center"
                                           href="#">
                                            <div class="icon-container">
                                                <i class="fas fa-user fa-fw"></i>
                                            </div>
                                            <div class="text-container">
                                                <span class="text-drop-user text-gray-800 fw-bold">
                                                    {{ strtoupper($user->name) }} {{ strtoupper($user->last_name) }}
                                                </span>
                                                <span class="role-drop badge-light-success mt-0">
                                                    {{ $user }}

                                                </span>
                                                <span class="text-drop-email">
                                                        {{ $user->email }}
                                                </span>
                                            </div>
                                        </a>
                                        <!-- Logout section -->
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a class="dropdown-item text-gray-800 fw-medium" href="#"
                                               onclick="this.closest('form').submit()">
                                                <i class="fas fa-sign-out-alt fa-fw text-gray-400 logout-icon"></i>
                                                <span class="text-drop-logout">
                                                Cerrar sesión
                                            </span>
                                            </a>
                                        </form>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </nav>
            </header>


            <main>
                <!-- inicio contenido principal -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>

        <footer class="footer">
            <span>Copyright &copy; Magnamedic 2023</span>
        </footer>
    </div>
</div>


<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toast JS (opcional si usas una librería de toast diferente) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>
</html>
