<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12 text-center my-5">
        <h1 class="display-4 fw-bold">Bienvenido a UDG-Proyectos</h1>
        <p class="lead">Plataforma integral para la gestión de tesis y proyectos estudiantiles de la Universidad de Guadalajara.</p>
        <hr class="my-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg px-5">Comenzar</a>
            <a href="<?= base_url('proyectos') ?>" class="btn btn-outline-secondary btn-lg px-5">Ver Proyectos</a>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-person-fill fs-3"></i>
                </div>
                <h3>Estudiantes</h3>
                <p>Sube tus proyectos, solicita revisiones y realiza el seguimiento de tu proceso de titulación.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-check-circle-fill fs-3"></i>
                </div>
                <h3>Comité</h3>
                <p>Evalúa proyectos, deja comentarios y gestiona el estatus de las tesis estudiantiles.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
                <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-search fs-3"></i>
                </div>
                <h3>Público</h3>
                <p>Consulta el repositorio de proyectos aprobados y conoce las investigaciones de nuestra comunidad.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
