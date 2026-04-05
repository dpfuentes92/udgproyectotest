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
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('common/footer') ?>
</body>
</html>
