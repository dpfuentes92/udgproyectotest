<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-5 py-4 bg-primary text-white rounded shadow-sm">
    <div class="col-md-8 mx-auto text-center">
        <h1 class="display-5 fw-bold">Repositorio Digital de Proyectos</h1>
        <p class="lead">Consulta las investigaciones y tesis aprobadas por la comunidad académica de la UDG.</p>
        <form class="d-flex mt-4 shadow-sm">
            <input class="form-control form-control-lg me-2" type="search" placeholder="Buscar por título, autor o palabras clave..." aria-label="Search">
            <button class="btn btn-warning btn-lg px-4 fw-bold" type="submit">Buscar</button>
        </form>
    </div>
</div>

<div class="row g-4">
    <?php for ($i = 1; $i <= 6; $i++): ?>
    <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 transition-hover">
            <div class="card-body">
                <span class="badge bg-light text-primary mb-2 border">Ingeniería</span>
                <h5 class="card-title fw-bold">Análisis de Estructuras en Zonas Sísmicas de Jaliscov<?= $i ?></h5>
                <p class="card-text text-muted small">Por: Ing. Ricardo Torres | Enero 2026</p>
                <p class="card-text">Estudio detallado sobre el impacto de los movimientos telúricos en edificaciones del área metropolitana...</p>
            </div>
            <div class="card-footer bg-white border-0 pb-4">
                <a href="<?= base_url('repositorio/detalle/'.$i) ?>" class="btn btn-outline-primary w-100">Leer más</a>
            </div>
        </div>
    </div>
    <?php endfor; ?>
</div>

<nav class="mt-5" aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-item" href="#">Anterior</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
    </ul>
</nav>
<?= $this->endSection() ?>
