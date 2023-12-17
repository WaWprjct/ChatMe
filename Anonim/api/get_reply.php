<?php
// Path file database.txt
$file = 'database.txt';

// Baca isi file database.txt
$data = file_get_contents($file);

// Dekode data menjadi array
$database = json_decode($data, true);

// Periksa apakah id_link dan pesanId ada di database
if (isset($_POST['id_link']) && isset($_POST['pesan_id']) && isset($database[$_POST['id_link']]) && isset($database[$_POST['id_link']]['pesan'][$_POST['pesan_id']])) {
    $reply = $database[$_POST['id_link']]['pesan'][$_POST['pesan_id']]['reply'];
    echo json_encode(['status' => 'success', 'reply' => $reply]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve reply']);
}
?>
