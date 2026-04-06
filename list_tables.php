<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}
$result = $mysqli->query("SHOW TABLES");
echo "Tablas en tesis_udg:\n";
while($row = $result->fetch_array()) {
    echo $row[0] . "\n";
}
