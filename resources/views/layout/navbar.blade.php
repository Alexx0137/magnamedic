<header>
    <nav class="dashboard-navbar navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-end w-100">
                <div class="user-profile dropdown">
                    <a class="dropdown-toggle-no-arrow" href="#" role="button" id="userDropdown"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-gray-600 mr-2">Nelson García</span>
                        <img src={userAvatar} alt="User Avatar" class="img-profile rounded-circle"
                             style={{width: '30px', height: '30px'}}/>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Configuraciones
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onClick={confirmLogout}>
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
