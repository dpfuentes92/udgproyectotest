<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 2rem; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn { padding: 5px 10px; background: #0055A5; color: white; border: none; border-radius: 4px; text-decoration: none; display: inline-block; }
        .role-card { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .role-card h3 { margin-top: 0; color: #0055A5; }
        ul { list-style-type: square; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestión de Roles y Permisos</h2>
        <a href="<?= base_url('admin') ?>" class="btn" style="margin-bottom:20px;">Volver al Dashboard</a>
        
        <p>A continuación se detallan los accesos asignados por directiva a cada rol. El sistema RBAC actual restringe directamente el acceso a las rutas basadas en este esquema.</p>

        <?php foreach ($roles as $nombre => $permisos): ?>
            <div class="role-card">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3><?= esc($nombre) ?></h3>
                    <button class="btn btn-sm" onclick="alert('Funcionalidad de guardado de permisos en preparación')">Editar Permisos</button>
                </div>
                <div style="margin-top: 10px;">
                    <?php 
                    $todosLosPermisos = [
                        'Ver Repositorio', 'Subir Proyectos', 'Editar Usuarios', 
                        'Eliminar Usuarios', 'Dictaminar Proyectos', 'Gestionar Roles'
                    ];
                    foreach ($todosLosPermisos as $p): 
                        $hab = in_array($p, $permisos) || $nombre == 'Administrador';
                    ?>
                        <label style="display: block; margin-bottom: 5px; cursor: pointer;">
                            <input type="checkbox" <?= $hab ? 'checked' : '' ?> disabled> <?= $p ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        
        <p><em>* En esta versión, la gestión de asignación de roles a nivel granular a nivel base de datos se maneja cambiando el rol del usuario en la pantalla "Gestión de Usuarios".</em></p>
    </div>
</body>
</html>
