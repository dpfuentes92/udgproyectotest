<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center align-items-center mb-5" style="min-height: 60vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow border-0">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="UDG Logo" width="180" class="mb-4">
                    <h2 class="fw-bold">Iniciar Sesión</h2>
                    <p class="text-muted">Ingresa tus credenciales</p>
                </div>
                <form action="<?= base_url('login') ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario o Correo</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Tu usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">¿No tienes cuenta? <a href="<?= base_url('registro') ?>">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
