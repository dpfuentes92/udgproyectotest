<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-md-8">
        <h2>Gestión de Cuentas de Usuario</h2>
        <p class="text-muted">Administra el acceso de estudiantes, evaluadores y administradores.</p>
    </div>
    <div class="col-md-4 text-end">
        <button class="btn btn-primary"><i class="bi bi-person-plus"></i> Nuevo Usuario</button>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Usuario</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($usuarios)): ?>
                        <tr><td colspan="6" class="text-center py-4 text-muted">No hay usuarios registrados.</td></tr>
                    <?php else: ?>
                        <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td class="ps-4">#<?= $u['id'] ?></td>
                            <td><strong><?= $u['username'] ?></strong></td>
                            <td><?= $u['first_name'] . ' ' . $u['last_name'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td><span class="badge bg-secondary"><?= $u['role_id'] == 1 ? 'Admin' : 'Estudiante' ?></span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-dark me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
