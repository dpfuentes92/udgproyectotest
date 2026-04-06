<?php
require 'vendor/autoload.php'; // Not needed in CI4 usually but I'm doing a standalone test
// Manual CI4 bootstrap is complex, I'll use a controller-based test or just a raw mysqli test.

$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}

// Check for missing columns or constraints that might prevent insert
$test_user = [
    'codigo_institucional' => 'TEST999',
    'nombre_completo' => 'Usuario Test',
    'correo' => 'test@udg.mx',
    'password_hash' => password_hash('password123', PASSWORD_BCRYPT),
    'rol' => 'estudiante',
    'estado' => 'activo'
];

$cols = implode(',', array_keys($test_user));
$vals = "'" . implode("','", array_values($test_user)) . "'";
$sql = "INSERT INTO usuarios ($cols) VALUES ($vals)";

if ($mysqli->query($sql)) {
    echo "Insert Successful!\n";
    $mysqli->query("DELETE FROM usuarios WHERE codigo_institucional='TEST999'");
} else {
    echo "Insert Failed: " . $mysqli->error . "\n";
}
