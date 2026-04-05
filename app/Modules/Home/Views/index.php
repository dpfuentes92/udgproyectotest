<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-light rounded-3 shadow-sm border">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Gestión de Tesis UDG</h1>
        <p class="col-md-8 fs-4 mx-auto text-muted">Bienvenido al sistema UDG-Proyectos, la plataforma central para el seguimiento de proyectos de investigación y titulación.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="<?= base_url('registro') ?>" class="btn btn-primary btn-lg px-4">Registrarse como Estudiante</a>
            <a href="<?= base_url('proyectos') ?>" class="btn btn-outline-secondary btn-lg px-4">Explorar Repositorio</a>
        </div>
    </div>
</div>

<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <div class="feature col text-center">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 rounded-3" style="width: 4rem; height: 4rem;">
            <i class="bi bi-file-earmark-text"></i>
        </div>
        <h3 class="fs-2">Entrega Digital</h3>
        <p>Sube tus documentos finales y tesis de manera digital para su revisión inmediata por el comité especializado.</p>
    </div>
    <div class="feature col text-center">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3 rounded-3" style="width: 4rem; height: 4rem;">
            <i class="bi bi-person-check"></i>
        </div>
        <h3 class="fs-2">Seguimiento Real</h3>
        <p>Conoce en tiempo real el estado de tu proyecto, desde la recepción hasta la aprobación final del jurado.</p>
    </div>
    <div class="feature col text-center">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-info bg-gradient fs-2 mb-3 rounded-3" style="width: 4rem; height: 4rem;">
            <i class="bi bi-journals"></i>
        </div>
        <h3 class="fs-2">Repositorio Público</h3>
        <p>Una vez aprobados, los proyectos pasan a formar parte del acervo digital de la Universidad de Guadalajara.</p>
    </div>
</div>
<?= $this->endSection() ?>
