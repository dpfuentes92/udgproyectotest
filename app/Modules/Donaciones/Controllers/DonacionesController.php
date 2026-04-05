<?php

namespace Modules\Donaciones\Controllers;

use App\Controllers\BaseController;

/**
 * DonacionesController
 * Gestión de donaciones y patrocinio de proyectos.
 */
class DonacionesController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Módulo de Donaciones - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Donaciones', 'url' => '#', 'active' => true]
            ]
        ];
        return view('Modules\Donaciones\Views\index', $data);
    }
}
