<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// --- Public Routes ---
$routes->get('/', 'HomeController::index');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('registro', 'AuthController::registro');
$routes->post('registro', 'AuthController::registro');
$routes->get('logout', 'AuthController::logout');

$routes->group('repositorio', function($routes) {
    $routes->get('/', 'RepositorioController::index');
    $routes->get('detalle/(:num)', 'RepositorioController::detalle/$1');
});

$routes->get('portafolio/perfil/(:any)', 'PortafolioController::perfil/$1');

// --- Protected Routes (Requesting Filters later) ---
$routes->group('estudiante', function($routes) {
    $routes->get('/', 'EstudianteController::dashboard');
    $routes->get('dashboard', 'EstudianteController::dashboard');
    $routes->get('subir_proyecto', 'EstudianteController::subir_proyecto');
    $routes->get('mis_proyectos', 'EstudianteController::mis_proyectos');
    $routes->post('guardar_proyecto', 'EstudianteController::guardar_proyecto');
});

$routes->group('comite', function($routes) {
    $routes->get('/', 'ComiteController::dashboard');
    $routes->get('dashboard', 'ComiteController::dashboard');
    $routes->get('revisar_proyecto/(:num)', 'ComiteController::revisar_proyecto/$1');
    $routes->post('dictaminar', 'ComiteController::dictaminar');
});

$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('usuarios', 'AdminController::usuarios');
});

$routes->get('notificaciones', 'NotificacionController::index');

// --- API Routes (AJAX) ---
$routes->group('api', function($routes) {
    $routes->post('votos/votar', 'VotoController::votar');
    $routes->post('comentarios/agregar', 'ComentarioController::agregar');
});
