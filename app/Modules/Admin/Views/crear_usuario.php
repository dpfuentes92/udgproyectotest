<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 2rem; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #0055A5; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #004080; }
        .alert { padding: 10px; margin-bottom: 15px; background: #ffebee; color: #c62828; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Crear Nuevo Usuario</h2>
        <a href="<?= base_url('admin/usuarios') ?>" style="display:inline-block; margin-bottom:15px;">&#8592; Volver</a>
        
        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/usuarios/guardar') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Código Estudiante / Empleado</label>
                <input type="text" name="codigo_institucional" required>
            </div>
            <div class="form-group">
                <label>Nombre Completo</label>
                <input type="text" name="nombre_completo" required>
            </div>
            <div class="form-group">
                <label>Correo Institucional</label>
                <input type="email" name="correo" required placeholder="ejemplo@alumnos.udg.mx">
            </div>
            <div class="form-group">
                <label>Contraseña Provisional (Opcional)</label>
                <input type="password" name="password_hash" placeholder="Si se deja vacío, el sistema generará una aleatoria.">
            </div>
            <div class="form-group">
                <label>Rol del Sistema</label>
                <select name="rol" required>
                    <option value="estudiante">Estudiante</option>
                    <option value="comite">Comité</option>
                    <option value="administrador">Administrador</option>
                    <option value="visitante">Visitante</option>
                </select>
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select name="estado">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label>Frecuencia de Notificaciones</label>
                <select name="notif_frecuencia">
                    <option value="inmediata">Inmediata</option>
                    <option value="diaria">Diaria</option>
                    <option value="desactivada">Desactivada</option>
                </select>
            </div>
            <button type="submit">Guardar Usuario</button>
        </form>
    </div>
</body>
</html>
