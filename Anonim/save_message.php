<?php
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $id_link = $_POST['id_link'];

    // Path file database.txt
    $file = 'api/database.txt';

    // Baca isi file database.txt
    $data = file_get_contents($file);

    // Dekode data menjadi array
    $database = json_decode($data, true);

    // Cek apakah id_link sudah ada di database
    if (!isset($database[$id_link])) {
        // Jika belum ada, tambahkan id_link ke dalam database dengan struktur yang sesuai
        $database[$id_link] = [
            'nama' => '',
            'pesan' => []
        ];
    }

    // Buat ID pesan
    $pesanId = 'id_pesan' . uniqid();

    // Buat objek pesan baru
    $pesanBaru = [
        'pesan' => $message,
        'waktu' => date('d/m/y H:i:A'),
        'reply' => null,
        'time' => null
    ];

    // Tambahkan pesan baru ke dalam id_link
    $database[$id_link]['pesan'][$pesanId] = $pesanBaru;

    // Encode data menjadi format JSON
    $encodedData = json_encode($database, JSON_PRETTY_PRINT);

    // Simpan data ke dalam file database.txt
    if (file_put_contents($file, $encodedData) !== false) {
        // Respon berhasil
        echo json_encode(['status' => 'success']);
    } else {
        // Respon gagal
        echo json_encode(['status' => 'error']);
    }
} else {
    // Respon jika request bukan menggunakan metode POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
