<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', '\Modules\Home\Controllers\HomeController::index');

// --- Public Routes ---
$routes->get('/', '\Modules\Home\Controllers\HomeController::index');

$routes->get('login', '\Modules\Auth\Controllers\AuthController::login');
$routes->post('login', '\Modules\Auth\Controllers\AuthController::login');
$routes->get('registro', '\Modules\Auth\Controllers\AuthController::registro');
$routes->post('registro', '\Modules\Auth\Controllers\AuthController::registro');
$routes->get('logout', '\Modules\Auth\Controllers\AuthController::logout');

$routes->group('repositorio', ['namespace' => 'Modules\Repositorio\Controllers'], function($routes) {
    $routes->get('/', 'RepositorioController::index');
    $routes->get('detalle/(:num)', 'RepositorioController::detalle/$1');
});

$routes->get('portafolio/perfil/(:any)', '\Modules\Portafolio\Controllers\PortafolioController::perfil/$1');

// --- Protected Routes (Requesting Filters later) ---
$routes->group('estudiante', ['namespace' => 'Modules\Student\Controllers'], function($routes) {
    $routes->get('/', 'EstudianteController::dashboard');
    $routes->get('dashboard', 'EstudianteController::dashboard');
    $routes->get('subir_proyecto', 'EstudianteController::subir_proyecto');
    $routes->get('mis_proyectos', 'EstudianteController::mis_proyectos');
    $routes->post('guardar_proyecto', 'EstudianteController::guardar_proyecto');
});

$routes->group('comite', ['namespace' => 'Modules\Comite\Controllers'], function($routes) {
    $routes->get('/', 'ComiteController::dashboard');
    $routes->get('dashboard', 'ComiteController::dashboard');
    $routes->get('revisar_proyecto/(:num)', 'ComiteController::revisar_proyecto/$1');
    $routes->post('dictaminar', 'ComiteController::dictaminar');
});

$routes->group('admin', ['namespace' => 'Modules\Admin\Controllers'], function($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('usuarios', 'AdminController::usuarios');
});

$routes->get('notificaciones', '\Modules\Notificaciones\Controllers\NotificacionController::index');

// --- API Routes (AJAX) ---
$routes->group('api', function($routes) {
    $routes->post('votos/votar', 'VotoController::votar');
    $routes->post('comentarios/agregar', 'ComentarioController::agregar');
});
