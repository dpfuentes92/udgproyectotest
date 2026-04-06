<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}

// Try to update the first non-admin user to inactivo
$id_res = $mysqli->query("SELECT id FROM usuarios WHERE rol != 'administrador' LIMIT 1");
if ($id_res && $row = $id_res->fetch_assoc()) {
    $id = $row['id'];
    echo "Attempting to update user ID $id to inactivo...\n";
    if ($mysqli->query("UPDATE usuarios SET estado='inactivo' WHERE id=$id")) {
        echo "Update Successful!\n";
        $mysqli->query("UPDATE usuarios SET estado='activo' WHERE id=$id");
    } else {
        echo "Update Failed: " . $mysqli->error . "\n";
    }
} else {
    echo "No non-admin user found to test.\n";
}
