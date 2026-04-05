<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Bienvenido, <?= $user['first_name'] ?? 'Estudiante' ?></h1>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-primary h-100 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-cloud-upload fs-1 text-primary"></i>
                <h4 class="mt-3">Subir Proyecto</h4>
                <p class="text-muted">Carga tu documento de tesis en formato PDF para revisión.</p>
                <a href="<?= base_url('estudiante/subir_proyecto') ?>" class="btn btn-primary px-4 mt-3">Comenzar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success h-100 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-list-check fs-1 text-success"></i>
                <h4 class="mt-3">Mis Proyectos</h4>
                <p class="text-muted">Consulta el historial y los comentarios de tus entregas.</p>
                <a href="<?= base_url('estudiante/mis_proyectos') ?>" class="btn btn-success px-4 mt-3">Ver Listado</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-info h-100 shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-bell-fill fs-1 text-info"></i>
                <h4 class="mt-3">Notificaciones</h4>
                <p class="text-muted">Tienes 2 revisiones pendientes de leer del comité.</p>
                <a href="<?= base_url('notificaciones') ?>" class="btn btn-info text-white px-4 mt-3">Ir al Centro</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
