<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Mis Proyectos Enviados</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?= base_url('estudiante/subir_proyecto') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Nuevo Proyecto</a>
    </div>
</div>

<div class="card shadow border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Folio</th>
                        <th>Título</th>
                        <th>Fecha de Envío</th>
                        <th>Estado</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">#00124</td>
                        <td><strong>Optimización de procesos mediante IA</strong></td>
                        <td>04 Abr 2026</td>
                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">#00098</td>
                        <td><strong>Análisis de datos en Cloud Computing</strong></td>
                        <td>15 Mar 2026</td>
                        <td><span class="badge bg-info">En Revisión</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">#00052</td>
                        <td><strong>Desarrollo Web con Microservicios</strong></td>
                        <td>10 Feb 2026</td>
                        <td><span class="badge bg-success">Aprobado</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
