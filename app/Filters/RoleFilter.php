<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder a esta sección.');
        }

        $userRole = session()->get('rol');

        // Un administrador tiene acceso a todo
        if ($userRole === 'administrador') {
            return;
        }

        if ($arguments && !in_array($userRole, $arguments)) {
            // Send back to their respective dashboard or home
            return redirect()->to('/')->with('error', 'No tienes acceso a esta sección');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
