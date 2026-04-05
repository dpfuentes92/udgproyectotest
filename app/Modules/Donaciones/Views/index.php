<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Sistema de Donaciones</h1>
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

    <div class="card shadow-sm border-0 rounded-lg mt-4 bg-light">
        <div class="card-body p-5">
            <h2 class="h4 mb-4 text-primary">Impulsa el Talento</h2>
            <p class="lead">Este módulo permitirá realizar contribuciones para el desarrollo de proyectos de investigación y titulación.</p>
            <div class="alert alert-warning border-0">
                <i class="fas fa-info-circle mr-2"></i> Módulo en construcción. Próximamente se integrarán las pasarelas de pago seguro.
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
