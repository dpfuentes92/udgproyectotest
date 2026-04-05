<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white p-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Visualización de Proyecto #<?= $id ?></h5>
                <span class="badge bg-info">En Revisión</span>
            </div>
            <div class="card-body">
                <h3>Optimización de procesos mediante Inteligencia Artificial aplicada a la industria</h3>
                <p class="text-muted small">Enviado por: Juan García López | 04 Abril 2026</p>
                <hr>
                <h5>Resumen</h5>
                <p>Esta investigación aborda el uso de redes neuronales convolucionales para la detección de anomalías en líneas de producción...</p>
                
                <div class="bg-light p-5 rounded text-center border mt-4">
                    <i class="bi bi-file-pdf fs-1 text-danger"></i>
                    <p class="mb-0 mt-2">Visor de PDF Integrado (Mockup)</p>
                    <a href="#" class="btn btn-link">Descargar archivo original</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow border-0 sticky-top" style="top: 80px;">
            <div class="card-header bg-dark text-white p-3">
                <h5 class="mb-0">Panel de Dictaminación</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('comite/dictaminar') ?>" method="POST">
                    <input type="hidden" name="project_id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="score" class="form-label">Calificación (0-100)</label>
                        <input type="number" class="form-control" id="score" name="score" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="comments" class="form-label">Retroalimentación / Comentarios</label>
                        <textarea class="form-control" id="comments" name="comments" rows="6" required placeholder="Escribe aquí tus observaciones para el estudiante..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resolución Final</label>
                        <select class="form-select" name="status" required>
                            <option value="">Selecciona una opción...</option>
                            <option value="aprobado">Aprobar Proyecto</option>
                            <option value="revision">Requiere Modificaciones</option>
                            <option value="rechazado">Rechazar Permanentemente</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Registrar Dictamen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
