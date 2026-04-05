<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

/**
 * AuthController
 * Gestiona la autenticación de usuarios: login, registro y cierre de sesión.
 */
class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Iniciar Sesión - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Login', 'url' => '#', 'active' => true]
            ]
        ];
        return view('auth/login', $data);
    }

    public function registro()
    {
        $data = [
            'title' => 'Registro de Estudiante - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Registro', 'url' => '#', 'active' => true]
            ]
        ];
        return view('auth/registro', $data);
    }

    public function logout()
    {
        // Lógica de logout
        return redirect()->to('/');
    }
}
