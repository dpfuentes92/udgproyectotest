<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="mb-4 d-flex align-items-center">
            <i class="bi bi-bell-fill text-primary me-2"></i> Centro de Notificaciones
        </h2>
        
        <div class="card shadow border-0 overflow-hidden">
            <div class="list-group list-group-flush">
                <div class="list-group-item list-group-item-action p-4 border-start border-primary border-4">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 fw-bold">Tu proyecto ha sido aprobado</h5>
                        <small class="text-muted">Hace 15 min</small>
                    </div>
                    <p class="mb-1">El Comité Evaluador ha finalizado la revisión de "Optimización de procesos mediante IA". Puedes consultar los comentarios finales.</p>
                    <a href="<?= base_url('estudiante/mis_proyectos') ?>" class="btn btn-sm btn-link p-0 text-primary">Ir al proyecto</a>
                </div>
                
                <div class="list-group-item list-group-item-action p-4 shadow-sm">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 fw-bold">Nuevo comentario en tu revisión</h5>
                        <small class="text-muted">Hace 2 horas</small>
                    </div>
                    <p class="mb-1">El evaluador Dr. Pérez ha dejado una observación técnica en el apartado de Metodología.</p>
                    <a href="#" class="btn btn-sm btn-link p-0 text-primary">Leer comentario</a>
                </div>
                
                <div class="list-group-item list-group-item-action p-4 text-muted bg-light">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Bienvenido al sistema</h5>
                        <small>01 Abr 2026</small>
                    </div>
                    <p class="mb-1">Gracias por registrarte en UDG-Proyectos. Completa tu perfil para que otros investigadores te conozcan.</p>
                </div>
            </div>
            
            <div class="card-footer bg-white text-center py-3">
                <a href="#" class="text-decoration-none small">Marcar todas como leídas</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
