<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #0055A5; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #004080; }
        .alert { padding: 10px; margin-bottom: 10px; background: #ffebee; color: #c62828; border-radius: 4px; }
        .success { background: #e8f5e9; color: #2e7d32; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verificación 2FA</h2>
        <p>Por seguridad, se ha enviado un código a tu correo institucional.</p>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login/verify2fa') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="text" name="code" placeholder="Código de 6 dígitos" required pattern="\d{6}">
            <button type="submit">Verificar</button>
        </form>
    </div>
</body>
</html>
