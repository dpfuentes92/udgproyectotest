<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1>Dashboard del Comité Evaluador</h1>
    </div>
    <div class="col-md-6 text-end text-muted">
        Última actualización: <?= date('d/m/Y H:i') ?>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-3">
        <div class="card text-bg-warning shadow-sm border-0">
            <div class="card-body p-4 text-center">
                <h2 class="display-4 fw-bold mb-0">15</h2>
                <p class="mb-0">Pendientes</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-info text-white shadow-sm border-0">
            <div class="card-body p-4 text-center">
                <h2 class="display-4 fw-bold mb-0">8</h2>
                <p class="mb-0">En Revisión</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success shadow-sm border-0">
            <div class="card-body p-4 text-center">
                <h2 class="display-4 fw-bold mb-0">42</h2>
                <p class="mb-0">Aprobados</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-danger shadow-sm border-0">
            <div class="card-body p-4 text-center">
                <h2 class="display-4 fw-bold mb-0">3</h2>
                <p class="mb-0">Rechazados</p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow border-0">
    <div class="card-header bg-dark text-white p-3">
        <h5 class="mb-0"><i class="bi bi-clock-history"></i> Proyectos Esperando Revisión</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Folio</th>
                        <th>Estudiante</th>
                        <th>Título del Proyecto</th>
                        <th>Fecha</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">#00124</td>
                        <td>García López, Juan</td>
                        <td><strong>Optimización de procesos mediante IA</strong></td>
                        <td>Hoy, 10:45 AM</td>
                        <td class="text-end pe-4">
                            <a href="<?= base_url('comite/revisar_proyecto/124') ?>" class="btn btn-primary btn-sm px-3">Revisar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4">#00123</td>
                        <td>Martínez Ruiz, Ana</td>
                        <td><strong>Seguridad en Redes 5G</strong></td>
                        <td>Ayer, 16:30 PM</td>
                        <td class="text-end pe-4">
                            <a href="<?= base_url('comite/revisar_proyecto/123') ?>" class="btn btn-primary btn-sm px-3">Revisar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
