<?php
$mysqli = new mysqli("localhost", "root", "postgres", "tesis_udg");
if ($mysqli->connect_error) {
    $mysqli = new mysqli("localhost", "root", "", "tesis_udg");
}
$output = "";
function describe($table, $mysqli, &$output) {
    $output .= "--- $table ---\n";
    $result = $mysqli->query("DESCRIBE $table");
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $output .= implode(" | ", $row) . "\n";
        }
    } else { $output .= "Error: " . $mysqli->error . "\n"; }
}
describe('proyectos', $mysqli, $output);
describe('auditoria_usuarios', $mysqli, $output);
describe('usuarios', $mysqli, $output);
// Force UTF-8 without BOM
file_put_contents('c:\xampp\htdocs\udg-proyectos\schema_dump.txt', $output);
echo "Schema written to schema_dump.txt";
