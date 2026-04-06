<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}
$result = $mysqli->query("DESCRIBE proyectos");
echo "Columnas en proyectos:\n";
while($row = $result->fetch_array()) {
    echo $row[0] . " (" . $row[1] . ")\n";
}
echo "\nColumnas en auditoria_usuarios:\n";
$result = $mysqli->query("DESCRIBE auditoria_usuarios");
if ($result) {
    while($row = $result->fetch_array()) {
        echo $row[0] . " (" . $row[1] . ")\n";
    }
}
