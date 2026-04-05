<?php

namespace App\Modules\Comite\Controllers;

use App\Controllers\BaseController;

/**
 * ComiteController
 * Gestiona la revisión y dictaminación de proyectos por parte del comité.
 */
class ComiteController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel del Comité - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Comité', 'url' => '#', 'active' => false],
                ['name' => 'Dashboard', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Comite\Views\dashboard', $data);
    }

    public function revisar_proyecto($id)
    {
        $data = [
            'title' => 'Revisar Proyecto - UDG-Proyectos',
            'proyecto_id' => $id,
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('comite'), 'active' => false],
                ['name' => 'Revisar Proyecto', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Comite\Views\revisar_proyecto', $data);
    }

    public function dictaminar()
    {
        // Lógica de dictaminación
        return redirect()->to('/comite/dashboard');
    }
}
