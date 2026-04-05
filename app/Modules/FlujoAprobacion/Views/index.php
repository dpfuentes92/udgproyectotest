<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Flujo de Aprobación</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumbs as $breadcrumb): ?>
                        <li class="breadcrumb-item <?= $breadcrumb['active'] ? 'active' : '' ?>">
                            <?php if (!$breadcrumb['active']): ?>
                                <a href="<?= $breadcrumb['url'] ?>"><?= $breadcrumb['name'] ?></a>
                            <?php else: ?>
                                <?= $breadcrumb['name'] ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-lg mt-4">
        <div class="card-body p-5">
            <h2 class="h4 mb-4">Estado del Proceso</h2>
            <p class="text-muted">Aquí podrás realizar el seguimiento detallado de cada fase de aprobación del proyecto.</p>
            <div class="alert alert-info">
                Módulo en fase de desarrollo. Próximamente se integrarán las etapas de revisión.
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
