<?php
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_link = $_POST['id_link'];
    $pesanId = $_POST['pesan_id'];
    $reply = $_POST['reply'];
    $time = $_POST['time'];

    // Path file database.txt
    $file = 'api/database.txt';

    $date = date('h:i');

    // Baca isi file database.txt
    $data = file_get_contents($file);

    // Dekode data menjadi array
    $database = json_decode($data, true);

    // Periksa apakah id_link dan pesanId ada di database
    if (isset($database[$id_link]) && isset($database[$id_link]['pesan'][$pesanId])) {
        // Update reply
        $database[$id_link]['pesan'][$pesanId]['reply'] = $reply;
        $database[$id_link]['pesan'][$pesanId]['time'] = date('d/m/y H:i:A');


        // Simpan data ke dalam file database.txt
        if (file_put_contents($file, json_encode($database, JSON_PRETTY_PRINT)) !== false) {
            // Redirect kembali ke halaman tampilan database
            header('Location: edit.php');
            exit();
        } else {
            echo 'Failed to save changes.';
        }
    } else {
        echo 'Invalid id_link or pesan_id.';
    }
} else {
    echo 'Invalid request.';
}
