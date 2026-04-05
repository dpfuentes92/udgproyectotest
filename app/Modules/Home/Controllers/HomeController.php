<?php

namespace Modules\Home\Controllers;

use App\Controllers\BaseController;

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
        return view('Modules\Home\Views\index', $data);
    }
}
