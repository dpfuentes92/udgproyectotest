<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mb-5">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow border-0">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Registro de Estudiante</h2>
                    <p class="text-muted">Únete a la comunidad de investigadores de la UDG</p>
                </div>
                <form action="<?= base_url('registro') ?>" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Institucional</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirm" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Crear Cuenta</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="mb-0 text-muted">¿Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
