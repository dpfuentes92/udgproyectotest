<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="UDG Logo" height="60" class="me-3">
            <div class="lh-1">
                <span class="fs-4 fw-bold d-block">UDG-Proyectos</span>
                <small class="text-white-50 small" style="font-size: 0.65rem;">SISTEMA DE GESTIÓN DE TESIS</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link px-3" href="<?= base_url() ?>"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="<?= base_url('repositorio') ?>"><i class="bi bi-search"></i> Repositorio</a>
                </li>
                
                <?php 
                $userRole = session()->get('rol'); 
                $isLoggedIn = session()->get('isLoggedIn');
                ?>

                <!-- Menú Dropdown para Estudiantes (Visible para estudiante y admin) -->
                <?php if ($isLoggedIn && ($userRole === 'estudiante' || $userRole === 'administrador')): ?>
                <li class="nav-item dropdown px-lg-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Estudiante</a>
                    <ul class="dropdown-menu shadow border-0">
                        <li><a class="dropdown-item" href="<?= base_url('estudiante') ?>">Dashboard</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('estudiante/subir_proyecto') ?>">Subir Proyecto</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('estudiante/mis_proyectos') ?>">Mis Proyectos</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Menú Dropdown para Comité (Visible para comite y admin) -->
                <?php if ($isLoggedIn && ($userRole === 'comite' || $userRole === 'administrador')): ?>
                <li class="nav-item dropdown px-lg-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Comité</a>
                    <ul class="dropdown-menu shadow border-0">
                        <li><a class="dropdown-item" href="<?= base_url('comite') ?>">Revisiones Pendientes</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('comite/historial') ?>">Historial de Evaluaciones</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- Menú Dropdown para Admin (Visible solo para admin) -->
                <?php if ($isLoggedIn && $userRole === 'administrador'): ?>
                <li class="nav-item dropdown px-lg-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Administración</a>
                    <ul class="dropdown-menu shadow border-0">
                        <li><a class="dropdown-item" href="<?= base_url('admin') ?>">Panel Admin</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin/usuarios') ?>">Usuarios</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin/roles') ?>">Roles y Permisos</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if ($isLoggedIn): ?>
                <li class="nav-item ms-lg-3">
                    <a class="nav-link position-relative px-3" href="<?= base_url('notificaciones') ?>">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                </li>

                <li class="nav-item ms-lg-4">
                    <a class="btn btn-outline-light px-4 rounded-pill" href="<?= base_url('logout') ?>">Cerrar Sesión</a>
                </li>
                <?php else: ?>
                <li class="nav-item ms-lg-4">
                    <a class="btn btn-light px-4 rounded-pill text-primary fw-bold" href="<?= base_url('login') ?>">Iniciar Sesión</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
