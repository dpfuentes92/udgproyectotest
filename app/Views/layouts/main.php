<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('common/header') ?>
</head>
<body>
    <?= $this->include('common/navbar') ?>

    <div class="container mt-3">
        <?php if (isset($breadcrumbs)): ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumbs as $crumb): ?>
                        <li class="breadcrumb-item <?= $crumb['active'] ? 'active' : '' ?>" <?= $crumb['active'] ? 'aria-current="page"' : '' ?>>
                            <?php if ($crumb['active']): ?>
                                <?= $crumb['name'] ?>
                            <?php else: ?>
                                <a href="<?= $crumb['url'] ?>"><?= $crumb['name'] ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
    </div>

    <main class="container">
        <!-- Alertas Globales -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Atención:</strong>
                <ul class="mb-0 mt-1">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>


    <?= $this->include('common/footer') ?>
</body>
</html>
