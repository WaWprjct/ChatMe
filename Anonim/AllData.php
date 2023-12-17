<?php
header("Content-Type: application/json");

$database = file_get_contents("api/database.txt");
$json_obj = json_decode($database);

if ($json_obj) {
    echo json_encode($json_obj, JSON_PRETTY_PRINT);
    header('Refresh: 10; URL=edit.php');
} else {
    echo json_encode(["status" => false]);
    header('Refresh: 10; URL=edit.php');
}
?>