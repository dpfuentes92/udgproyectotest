<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'UDG-Proyectos' ?></title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<!-- Custom CSS -->
<style>
    :root {
        --udg-red: #cc0000;
        --udg-gold: #ffcc00;
        --udg-blue: #003366;
    }
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
        background-color: var(--udg-blue) !important;
    }
    .navbar-brand, .nav-link {
        color: white !important;
    }
    .btn-primary {
        background-color: var(--udg-blue);
        border-color: var(--udg-blue);
    }
    .btn-primary:hover {
        background-color: #002244;
    }
</style>
