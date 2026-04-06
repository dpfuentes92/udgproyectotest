<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
    <?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">Bienvenido, <?= $user['first_name'] ?? 'Administrador' ?></h1>
        <p class="text-muted">Panel de Herramientas Administrativas</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-primary h-100 shadow-sm transition-hover">
            <div class="card-body text-center py-5">
                <i class="bi bi-gear-fill fs-1 text-primary"></i>
                <h4 class="mt-3">Configuración</h4>
                <p class="text-muted">Ajustes generales del sistema y parámetros del módulo.</p>
                <a href="#" class="btn btn-primary px-4 mt-3">Administrar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success h-100 shadow-sm transition-hover">
            <div class="card-body text-center py-5">
                <i class="bi bi-database-fill-check fs-1 text-success"></i>
                <h4 class="mt-3">Mantenimiento</h4>
                <p class="text-muted">Limpieza de temporales y optimización de base de datos.</p>
                <a href="#" class="btn btn-success px-4 mt-3">Ejecutar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-info h-100 shadow-sm transition-hover">
            <div class="card-body text-center py-5">
                <i class="bi bi-file-earmark-bar-graph-fill fs-1 text-info"></i>
                <h4 class="mt-3">Reportes Globales</h4>
                <p class="text-muted">Generación de estadísticas y reportes consolidados.</p>
                <a href="#" class="btn btn-info text-white px-4 mt-3">Generar</a>
            </div>
        </div>
    </div>
</div>

<style>
.transition-hover {
    transition: transform 0.2s ease-in-out, shadow 0.2s ease-in-out;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
</style>
<?= $this->endSection() ?>
