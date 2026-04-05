<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use App\Models\ProyectoModel;

/**
 * EstudianteController
 * Gestiona las acciones permitidas para los alumnos: subir proyectos y ver su estado.
 */
class EstudianteController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel de Control - Estudiante',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Estudiante', 'url' => '#', 'active' => false],
                ['name' => 'Dashboard', 'url' => '#', 'active' => true]
            ]
        ];
        return view('Modules\Student\Views\dashboard', $data);
    }

    public function subir_proyecto()
    {
        $data = [
            'title' => 'Subir Nuevo Proyecto - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('estudiante'), 'active' => false],
                ['name' => 'Subir Proyecto', 'url' => '#', 'active' => true]
            ]
        ];
        return view('Modules\Student\Views\subir_proyecto', $data);
    }

    public function mis_proyectos()
    {
        $data = [
            'title' => 'Mis Proyectos - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('estudiante'), 'active' => false],
                ['name' => 'Mis Proyectos', 'url' => '#', 'active' => true]
            ]
        ];
        return view('Modules\Student\Views\mis_proyectos', $data);
    }
}
