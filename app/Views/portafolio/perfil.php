<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-4 mb-4">
            <img src="https://ui-avatars.com/api/?name=<?= $username ?>&background=random" class="rounded-circle mx-auto mb-3" width="150">
            <h2 class="fw-bold"><?= ucfirst($username) ?></h2>
            <p class="text-muted">Estudiante de Ingeniería en Computación</p>
            <div class="d-flex justify-content-center gap-2 mt-2">
                <a href="#" class="btn btn-sm btn-outline-primary"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="btn btn-sm btn-outline-dark"><i class="bi bi-github"></i></a>
            </div>
            <hr>
            <div class="text-start">
                <h6><i class="bi bi-envelope"></i> <?= $username ?>@alumnos.udg.mx</h6>
                <h6><i class="bi bi-geo-alt"></i> CUCEI, Guadalajara</h6>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card shadow border-0 p-4 mb-4">
            <h4 class="fw-bold mb-4">Biografía Profesional</h4>
            <p>Apasionado por el desarrollo de software y la inteligencia artificial. Mis investigaciones se centran en la optimización de algoritmos de búsqueda en entornos distribuidos.</p>
            
            <h4 class="fw-bold mt-4 mb-3">Proyectos Destacados</h4>
            <div class="list-group list-group-flush">
                <div class="list-group-item px-0 py-3">
                    <h5 class="mb-1">Optimización de procesos mediante IA</h5>
                    <p class="mb-1 text-muted small">Aprobado en Abril 2026</p>
                    <a href="#" class="btn btn-link p-0 text-decoration-none">Ver Detalles</a>
                </div>
                <div class="list-group-item px-0 py-3">
                    <h5 class="mb-1">Seguridad en Redes 5G</h5>
                    <p class="mb-1 text-muted small">En Revisión</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
