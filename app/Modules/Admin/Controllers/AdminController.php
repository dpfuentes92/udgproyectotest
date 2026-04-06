<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\AuditLogModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel de Administración - UDG-Proyectos'
        ];
        return view('App\Modules\Admin\Views\dashboard', $data);
    }

    public function usuarios()
    {
        $model = new UsuarioModel();
        $data = [
            'title' => 'Gestión de Usuarios - UDG-Proyectos',
            'usuarios' => $model->findAll()
        ];
        return view('App\Modules\Admin\Views\usuarios', $data);
    }

    public function crearUsuario()
    {
        $data = ['title' => 'Crear Usuario'];
        return view('App\Modules\Admin\Views\crear_usuario', $data);
    }

    public function guardarUsuario()
    {
        $model = new UsuarioModel();
        $data = $this->request->getPost();

        // Asignar password aleatoria temporal si no la ingresan
        if (empty($data['password_hash'])) {
            $data['password_hash'] = bin2hex(random_bytes(8));
        }

        if ($model->save($data)) {
            $this->logAction('alta', $model->getInsertID(), "Usuario creado: {$data['correo']} con rol {$data['rol']}");
            return redirect()->to('/admin/usuarios')->with('success', 'Usuario creado correctamente');
        }

        return redirect()->back()->withInput()->with('errors', $model->errors());
    }

    public function editarUsuario($id)
    {
        $model = new UsuarioModel();
        $data = [
            'title' => 'Editar Usuario',
            'usuario' => $model->find($id)
        ];

        if (!$data['usuario']) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado');
        }

        return view('App\Modules\Admin\Views\editar_usuario', $data);
    }

    public function actualizarUsuario($id)
    {
        $model = new UsuarioModel();
        $data = $this->request->getPost();
        
        // Evitar que el is_unique marque error por usar su propio correo
        $model->setValidationRule('correo', "required|valid_email|is_unique[usuarios.correo,id,{$id}]|regex_match[/^[a-zA-Z0-9._%+-]+@(alumnos\.udg\.mx|docentes\.udg\.mx|udg\.mx)$/]");
        $model->setValidationRule('codigo_institucional', "required|is_unique[usuarios.codigo_institucional,id,{$id}]");

        if (empty($data['password_hash'])) {
            unset($data['password_hash']);
        }

        if ($model->update($id, $data)) {
            $this->logAction('modificacion', $id, "Usuario actualizado");
            return redirect()->to('/admin/usuarios')->with('success', 'Usuario actualizado correctamente');
        }

        return redirect()->back()->withInput()->with('errors', $model->errors());
    }

    public function eliminarUsuario($id)
    {
        if ($id == session()->get('id')) {
            return redirect()->to('/admin/usuarios')->with('error', 'No puedes desactivar tu propia cuenta.');
        }

        $model = new UsuarioModel();
        // Borrado suave simulado (Soft Delete al cambiar estado) - Evita fallos de foreign keys
        // Saltamos validación para permitir actualizar solo el estado
        if ($model->skipValidation(true)->update($id, ['estado' => 'inactivo'])) {
            $this->logAction('baja', $id, "Usuario desactivado exitosamente (estado: inactivo)");
            return redirect()->to('/admin/usuarios')->with('success', 'Usuario desactivado correctamente');
        }

        return redirect()->to('/admin/usuarios')->with('error', 'Error al desactivar usuario');
    }

    private function logAction($accion, $afectado_id, $detalle)
    {
        // Mapear nuestras acciones al enum de la BD: CREATE, UPDATE, DELETE, ROLE_CHANGE, LOGIN, LOGOUT
        $enumAccion = 'UPDATE';
        if ($accion === 'alta') $enumAccion = 'CREATE';
        if ($accion === 'baja') $enumAccion = 'DELETE';
        if ($accion === 'rol') $enumAccion = 'ROLE_CHANGE';

        $auditModel = new AuditLogModel();
        $auditModel->save([
            'accion' => $enumAccion,
            'usuario_afectado_id' => $afectado_id,
            'admin_id' => session()->get('id') ?? 1, // Fallback a 1 si no hay sesión (ej. test)
            'datos_nuevos' => json_encode(['detalle' => $detalle])
        ]);
    }

    public function roles()
    {
        $data = [
            'title' => 'Gestión de Roles y Permisos - UDG-Proyectos',
            'roles' => [
                'Administrador' => ['Gestión total de usuarios', 'Gestión de roles y permisos', 'Supervisión de repositorio'],
                'Comité' => ['Aprobar y dictaminar proyectos', 'Ver historial de evaluaciones'],
                'Estudiante' => ['Subir proyectos resueltos', 'Gestionar portafolio propio'],
                'Visitante' => ['Solo lectura del repositorio público']
            ]
        ];
        return view('App\Modules\Admin\Views\roles', $data);
    }
}
