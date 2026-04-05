<?php

namespace Modules\FlujoAprobacion\Controllers;

use App\Controllers\BaseController;

/**
 * FlujoAprobacionController
 * Gestiona el proceso de seguimiento y aprobación de proyectos.
 */
class FlujoAprobacionController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Flujo de Aprobación - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Flujo de Aprobación', 'url' => '#', 'active' => true]
            ]
        ];
        return view('Modules\FlujoAprobacion\Views\index', $data);
    }
}
