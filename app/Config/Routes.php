<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', '\App\Modules\Home\Controllers\HomeController::index');

// --- Public Routes ---
$routes->get('login', '\App\Modules\Auth\Controllers\AuthController::login');
$routes->post('login', '\App\Modules\Auth\Controllers\AuthController::login');
$routes->get('registro', '\App\Modules\Auth\Controllers\AuthController::registro');
$routes->post('registro', '\App\Modules\Auth\Controllers\AuthController::registro');
$routes->get('logout', '\App\Modules\Auth\Controllers\AuthController::logout');

$routes->group('repositorio', ['namespace' => 'App\Modules\Repositorio\Controllers'], function($routes) {
    $routes->get('/', 'RepositorioController::index');
    $routes->get('detalle/(:num)', 'RepositorioController::detalle/$1');
});

$routes->get('portafolio/perfil/(:any)', '\App\Modules\Portafolio\Controllers\PortafolioController::perfil/$1');

// --- Protected Routes ---
$routes->group('', ['filter' => 'auth'], function($routes) {
    // Estudiante
    $routes->group('estudiante', ['namespace' => 'App\Modules\Student\Controllers', 'filter' => 'role:estudiante'], function($routes) {
        $routes->get('/', 'EstudianteController::dashboard');
        $routes->get('dashboard', 'EstudianteController::dashboard');
        $routes->get('subir_proyecto', 'EstudianteController::subir_proyecto');
        $routes->get('mis_proyectos', 'EstudianteController::mis_proyectos');
        $routes->post('guardar_proyecto', 'EstudianteController::guardar_proyecto');
    });

    // Comité
    $routes->group('comite', ['namespace' => 'App\Modules\Comite\Controllers', 'filter' => 'role:comite'], function($routes) {
        $routes->get('/', 'ComiteController::dashboard');
        $routes->get('dashboard', 'ComiteController::dashboard');
        $routes->get('revisar_proyecto/(:num)', 'ComiteController::revisar_proyecto/$1');
        $routes->post('dictaminar', 'ComiteController::dictaminar');
        $routes->get('historial', 'ComiteController::historial');
    });

    // Admin
    $routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'role:administrador'], function($routes) {
        $routes->get('/', 'AdminController::dashboard');
        $routes->get('dashboard', 'AdminController::dashboard');
        $routes->get('usuarios', 'AdminController::usuarios');
        $routes->get('usuarios/crear', 'AdminController::crearUsuario');
        $routes->post('usuarios/guardar', 'AdminController::guardarUsuario');
        $routes->get('usuarios/editar/(:num)', 'AdminController::editarUsuario/$1');
        $routes->post('usuarios/actualizar/(:num)', 'AdminController::actualizarUsuario/$1');
        $routes->get('usuarios/eliminar/(:num)', 'AdminController::eliminarUsuario/$1');
        $routes->get('roles', 'AdminController::roles');
    });

    // Generic Protected Features
    $routes->get('flujo-aprobacion', '\App\Modules\FlujoAprobacion\Controllers\FlujoAprobacionController::index');
    $routes->get('donaciones', '\App\Modules\Donaciones\Controllers\DonacionesController::index');
    $routes->get('notificaciones', '\App\Modules\Notificaciones\Controllers\NotificacionController::index');
});

// --- API Routes (AJAX) ---
$routes->group('api', function($routes) {
    $routes->post('votos/votar', 'VotoController::votar');
    $routes->post('comentarios/agregar', 'ComentarioController::agregar');
});
