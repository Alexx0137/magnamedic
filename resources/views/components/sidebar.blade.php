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
            <a href="/dashboard"><span>Inicio</span></a>
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

        <li class="{{ request()->is('users*') ? 'active' : '' }}">
            <i class="fas fa-fw fa-users"></i>
            <a href="{{ route('users') }}"><span>Usuarios</span></a>
        </li>
        <li class="{{ request()->is('reports*') ? 'active' : '' }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <a href="{{ route('reports') }}"><span>Reportes</span></a>
        </li>
    </ul>
</div>
