<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12 mb-4">
        <h1 class="display-6"><i class="bi bi-shield-lock"></i> Administración del Sistema</h1>
        <p class="text-muted">Gestión global de usuarios, roles y parámetros generales.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="list-group shadow-sm">
            <a href="<?= base_url('admin/dashboard') ?>" class="list-group-item list-group-item-action active">Resumen General</a>
            <a href="<?= base_url('admin/usuarios') ?>" class="list-group-item list-group-item-action">Gestión de Usuarios</a>
            <a href="<?= base_url('admin/roles') ?>" class="list-group-item list-group-item-action">Roles y Permisos</a>
            <a href="<?= base_url('admin/reportes') ?>" class="list-group-item list-group-item-action">Reportes del Sistema</a>
            <a href="<?= base_url('admin/config') ?>" class="list-group-item list-group-item-action text-danger mt-3">Configuraciones Críticas</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-primary text-white p-3">
                    <h3>1,248</h3>
                    <p class="mb-0">Usuarios Totales</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm bg-success text-white p-3">
                    <h3>85</h3>
                    <p class="mb-0">Nuevos Proyectos (Mes)</p>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4 text-center py-5">
                <i class="bi bi-graph-up fs-1 text-muted opacity-25"></i>
                <h5 class="mt-3">Sección de Estadísticas en Construcción</h5>
                <p class="text-muted">Próximamente gráficas de rendimiento por carrera y departamento.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
