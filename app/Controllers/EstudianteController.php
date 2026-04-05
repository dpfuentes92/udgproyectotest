<?php

namespace App\Controllers;

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
        return view('estudiante/dashboard', $data);
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
        return view('estudiante/subir_proyecto', $data);
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
        return view('estudiante/mis_proyectos', $data);
    }
}
