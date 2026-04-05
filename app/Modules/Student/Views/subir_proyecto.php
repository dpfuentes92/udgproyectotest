<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white p-3">
                <h5 class="mb-0">Registro de Nuevo Proyecto / Tesis</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('estudiante/guardar_proyecto') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título del Proyecto</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Ej: Sistema de Gestión para..." required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Resumen / Abstract</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Breve explicación de tu investigación..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Archivo PDF (Máximo 10MB)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                    </div>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill"></i> Recuerda que una vez enviado, el proyecto entrará en estado de revisión y no podrás editarlo hasta que el comité emita un comentario.
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('estudiante') ?>" class="btn btn-secondary px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5">Enviar a Revisión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
