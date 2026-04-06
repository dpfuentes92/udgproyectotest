<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return $this->redirectBasedOnRole(session()->get('rol'));
        }

        if ($this->request->getMethod() === 'POST') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new UsuarioModel();
            $user = $model->where('correo', $email)->first();

            if (!$user || !password_verify($password, $user['password_hash'])) {
                return redirect()->back()->with('error', 'Correo o contraseña incorrectos');
            }

            if ($user['estado'] === 'inactivo') {
                return redirect()->back()->with('error', 'Tu cuenta ha sido desactivada. Contacta al administrador');
            }

            // Validar regex de correos UDG
            if (!preg_match('/^[a-zA-Z0-9._%+-]+@(alumnos\.udg\.mx|docentes\.udg\.mx|udg\.mx)$/', $email)) {
                return redirect()->back()->with('error', 'Solo se permite el acceso con correo institucional.');
            }

            session()->regenerate();

            session()->set([
                'id' => $user['id'],
                'rol' => $user['rol'],
                'nombre' => $user['nombre_completo'],
                'isLoggedIn' => true
            ]);

            return $this->redirectBasedOnRole($user['rol']);
        }

        $data = [
            'title' => 'Iniciar Sesión - UDG-Proyectos',
        ];
        return view('App\Modules\Auth\Views\login', $data);
    }

    public function registro()
    {
        // En implementación futura, para el rol Visitante u opcional
        return view('App\Modules\Auth\Views\registro', ['title' => 'Registro - UDG-Proyectos']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'administrador':
                return redirect()->to('/admin/dashboard');
            case 'comite':
                return redirect()->to('/comite/dashboard');
            case 'estudiante':
                return redirect()->to('/estudiante/dashboard');
            default:
                return redirect()->to('/');
        }
    }
}
