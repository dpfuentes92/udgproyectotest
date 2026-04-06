<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 2rem; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #0055A5; color: white; }
        .btn { padding: 5px 10px; background: #0055A5; color: white; border: none; border-radius: 4px; text-decoration: none; display: inline-block; }
        .btn-danger { background: #c62828; }
        .btn-success { background: #2e7d32; }
        .alert { padding: 10px; margin-bottom: 15px; color: white; border-radius: 4px; }
        .alert-success { background: #2e7d32; }
        .alert-error { background: #c62828; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <a href="<?= base_url('admin') ?>" class="btn" style="margin-bottom:15px;">Volver al Dashboard</a>
        <a href="<?= base_url('admin/usuarios/crear') ?>" class="btn btn-success" style="margin-bottom:15px; float:right;">+ Nuevo Usuario</a>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($usuarios)): ?>
                <?php foreach($usuarios as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['codigo_institucional']) ?></td>
                        <td><?= esc($user['nombre_completo']) ?></td>
                        <td><?= esc($user['correo']) ?></td>
                        <td><?= esc($user['rol']) ?></td>
                        <td><?= esc($user['estado']) ?></td>
                        <td>
                            <a href="<?= base_url('admin/usuarios/editar/' . $user['id']) ?>" class="btn">Editar</a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('<?= base_url('admin/usuarios/eliminar/' . $user['id']) ?>')">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7">No hay usuarios registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas desactivar este usuario? Esta acción cambiará su estado a inactivo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Si no está en el layout) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(url) {
            document.getElementById('confirmDeleteBtn').href = url;
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            myModal.show();
        }
    </script>
</body>
</html>
