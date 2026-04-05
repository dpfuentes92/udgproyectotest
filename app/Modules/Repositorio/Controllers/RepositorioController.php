<?php

namespace App\Modules\Repositorio\Controllers;

use App\Controllers\BaseController;
use App\Models\ProyectoModel;

/**
 * RepositorioController
 * Gestiona el acceso público a los proyectos aprobados y las búsquedas.
 */
class RepositorioController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Repositorio Digital - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Repositorio', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Repositorio\Views\index', $data);
    }

    public function detalle($id)
    {
        $data = [
            'title' => 'Detalle del Proyecto - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Repositorio', 'url' => base_url('repositorio'), 'active' => false],
                ['name' => 'Detalle', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Repositorio\Views\detalle', $data);
    }
}
