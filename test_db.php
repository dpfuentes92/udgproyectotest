<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}
$result = $mysqli->query("DESCRIBE usuarios");
$rows = [];
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
file_put_contents('c:\xampp\htdocs\udg-proyectos\schema.json', json_encode($rows, JSON_PRETTY_PRINT));
