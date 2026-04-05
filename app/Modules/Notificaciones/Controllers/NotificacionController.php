<?php

namespace App\Modules\Notificaciones\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificacionModel;

/**
 * NotificacionController
 * Centro de mensajes y alertas para los usuarios del sistema.
 */
class NotificacionController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Centro de Notificaciones - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Notificaciones', 'url' => '#', 'active' => true]
            ]
        ];
        return view('App\Modules\Notificaciones\Views\index', $data);
    }
}
