<?php

namespace App\Controllers;

/**
 * HomeController
 * Gestiona la página de inicio y el landing page principal.
 */
class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Inicio - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => true]
            ]
        ];
        return view('home/index', $data);
    }
}
