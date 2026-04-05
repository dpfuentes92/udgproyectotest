<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="fw-bold">Análisis de Estructuras en Zonas Sísmicas de Jalisco</h1>
        <p class="text-muted"><i class="bi bi-person"></i> Por: Ricardo Torres | <i class="bi bi-calendar"></i> Enero 2026 | <i class="bi bi-tag"></i> Ingeniería Civil</p>
        <hr>
        <h5>Descripción</h5>
        <p class="lead">Este proyecto de tesis presenta una metodología innovadora para el refuerzo estructural de edificios históricos en la zona centro de Guadalajara...</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        
        <div class="card bg-light border-0 p-4 mt-5">
            <h5 class="mb-3">Archivos Adjuntos</h5>
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm border">
                <i class="bi bi-file-earmark-pdf fs-1 text-danger me-3"></i>
                <div class="flex-grow-1">
                    <h6 class="mb-0">Tesis_Final_Torres_R.pdf</h6>
                    <small class="text-muted">12.5 MB | PDF</small>
                </div>
                <a href="#" class="btn btn-primary"><i class="bi bi-download"></i> Descargar</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title fw-bold">Sobre el Autor</h5>
                <div class="d-flex align-items-center mt-3">
                    <img src="https://ui-avatars.com/api/?name=Ricardo+Torres&background=random" class="rounded-circle me-3" width="60">
                    <div>
                        <h6 class="mb-0">Ricardo Torres</h6>
                        <a href="<?= base_url('portafolio/perfil/rtorres') ?>" class="text-primary small">Ver Portafolio Profesional</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold">Interacciones</h5>
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-outline-secondary w-50"><i class="bi bi-hand-thumbs-up"></i> 124</button>
                    <button class="btn btn-outline-secondary w-50"><i class="bi bi-share"></i> Compartir</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
