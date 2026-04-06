<?php

namespace App\Modules\Herramientas\Controllers;

use App\Controllers\BaseController;

/**
 * HerramientasController
 * Gestiona el módulo de herramientas administrativas.
 */
class HerramientasController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Herramientas - UDG-Proyectos',
            'user'  => [
                'first_name' => session()->get('first_name') ?? 'Administrador',
                'rol'        => session()->get('rol')
            ],
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Herramientas', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Herramientas\Views\index', $data);
    }
}
