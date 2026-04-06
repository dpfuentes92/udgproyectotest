<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}
$result = $mysqli->query("SELECT * FROM usuarios WHERE correo='admin@udg.mx'");
$user = $result->fetch_assoc();
if ($user) {
    echo "Found user: " . $user['correo'] . "\n";
    echo "Current hash in DB: " . $user['password_hash'] . "\n";
    
    // Check if it's plain text or invalid hash
    if (!password_verify('password123', $user['password_hash'])) {
        echo "Updating password to bcrypt hash...\n";
        $hash = password_hash('password123', PASSWORD_DEFAULT);
        $mysqli->query("UPDATE usuarios SET password_hash='$hash' WHERE id=" . $user['id']);
        echo "Password updated successfully!\n";
    } else {
        echo "Password is already correctly hashed for password123.\n";
    }
} else {
    echo "User admin@udg.mx not found in DB.\n";
}
