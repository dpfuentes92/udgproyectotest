<?php

namespace App\Modules\Portafolio\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\ProyectoModel;

/**
 * PortafolioController
 * Gestiona el perfil público de los estudiantes y su colección de proyectos.
 */
class PortafolioController extends BaseController
{
    public function perfil($username)
    {
        $data = [
            'title' => 'Perfil Profesional - UDG-Proyectos',
            'username' => $username,
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Portafolio', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Portafolio\Views\perfil', $data);
    }
}
