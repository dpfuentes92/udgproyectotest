<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

/**
 * AdminController
 * Gestiona la administración global del sistema, usuarios y configuraciones.
 */
class AdminController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel de Administración - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Admin', 'url' => '#', 'active' => false],
                ['name' => 'Dashboard', 'url' => '#', 'active' => true]
            ]
        ];
        return view('admin/dashboard', $data);
    }

    public function usuarios()
    {
        $model = new UsuarioModel();
        $data = [
            'title' => 'Gestión de Usuarios - UDG-Proyectos',
            'usuarios' => $model->findAll(),
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('admin'), 'active' => false],
                ['name' => 'Usuarios', 'url' => '#', 'active' => true]
            ]
        ];
        return view('admin/usuarios', $data);
    }
}
