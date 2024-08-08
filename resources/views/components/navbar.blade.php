<header>
    <nav class="dashboard-navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-end w-100">
                <div class="user-profile dropdown">
                    @if(isset($authUser))
                        <a class="dropdown-toggle-no-arrow" href="#" role="button" id="userDropdown"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-gray-600 mr-2">
                                {{ strtoupper($authUser->name) }} {{ strtoupper($authUser->last_name) }}
                            </span>
                            <img src="/assets/media/images/undraw_profile.svg" alt="User Avatar"
                                 class="img-profile rounded-circle" height="32" width="32">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <!-- Users info section -->
                            <a class="drop-info d-flex align-items-center" href="#">
                                <div class="icon-container">
                                    <i class="fas fa-user fa-fw"></i>
                                </div>
                                <div class="text-container">
                                    <span class="text-drop-user text-gray-800 fw-bold">
                                        {{ strtoupper($authUser->name) }} {{ strtoupper($authUser->last_name) }}
                                    </span>
                                    <span class="role-drop badge-light-success mt-0">
                                        {{ $authUser->role->name}}
                                    </span>
                                    <span class="text-drop-email">
                                        {{ $authUser->email }}
                                    </span>
                                </div>
                            </a>
                            <!-- Logout section -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item text-gray-800 fw-medium" href="#"
                                   onclick="this.closest('form').submit()">
                                    <i class="fas fa-sign-out-alt fa-fw text-gray-400 logout-icon"></i>
                                    <span class="text-drop-logout">Cerrar sesión</span>
                                </a>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
