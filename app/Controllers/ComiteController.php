<?php

namespace App\Controllers;

use App\Models\ProyectoModel;
use App\Models\EvaluacionModel;

/**
 * ComiteController
 * Gestiona las acciones de revisión, aprobación y rechazo de proyectos.
 */
class ComiteController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel de Control - Comité Evaluador',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Comité', 'url' => '#', 'active' => false],
                ['name' => 'Dashboard', 'url' => '#', 'active' => true]
            ]
        ];
        return view('comite/dashboard', $data);
    }

    public function revisar_proyecto($id)
    {
        $data = [
            'title' => 'Revisar Proyecto - UDG-Proyectos',
            'id' => $id,
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('comite'), 'active' => false],
                ['name' => 'Revisión', 'url' => '#', 'active' => true]
            ]
        ];
        return view('comite/revisar_proyecto', $data);
    }
}
