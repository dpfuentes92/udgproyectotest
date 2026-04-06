<?= view('App\Views\common\header', ['title' => $title]) ?>
<?= view('App\Views\common\navbar') ?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php foreach ($breadcrumbs as $crumb): ?>
                <li class="breadcrumb-item <?= $crumb['active'] ? 'active' : '' ?>">
                    <?= $crumb['active'] ? esc($crumb['name']) : '<a href="'.esc($crumb['url']).'">'.esc($crumb['name']).'</a>' ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <h2>Historial de Evaluaciones</h2>
    <div class="alert alert-info">
        Aquí aparecerá el registro de las evaluaciones que has emitido anteriormente.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
