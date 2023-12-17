<?php
// Path file database.txt
$file = 'api/database.txt';

// Baca isi file database.txt
$data = file_get_contents($file);

// Dekode data menjadi array
$database = json_decode($data, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove']) && isset($_POST['pesan_id'])) {
        $pesan_id = $_POST['pesan_id'];

        // Cek apakah id_link ada di database
        if (isset($database['001']['pesan'][$pesan_id])) {
            // Hapus pesan berdasarkan id_pesan tertentu
            unset($database['001']['pesan'][$pesan_id]);

            // Encode data menjadi format JSON
            $encodedData = json_encode($database, JSON_PRETTY_PRINT);

            // Simpan data ke dalam file database.txt
            if (file_put_contents($file, $encodedData) !== false) {
                // Redirect kembali ke halaman admin setelah berhasil menghapus pesan
                header('Location: edit.php');
                exit;
            } else {
                echo "Gagal menghapus pesan.";
            }
        } else {
            echo "Pesan tidak ditemukan.";
        }
    } elseif (isset($_POST['hapus_semua'])) {
        // Hapus semua data dalam database
        $database['001']['pesan'] = [];

        // Encode data menjadi format JSON
        $encodedData = json_encode($database, JSON_PRETTY_PRINT);

        // Simpan data ke dalam file database.txt
        if (file_put_contents($file, $encodedData) !== false) {
            // Redirect kembali ke halaman admin setelah berhasil menghapus semua data
            header('Location: edit.php');
            exit;
        } else {
            echo "Gagal menghapus semua data.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Database Viewer</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
            color: yellow;
        }
        .bc {
         background-image: url(bgedit.gif);
        }
    </style>
</head>
<body class="bc">
    <h1>Database Viewer</h1>
    <table>
    <thead>
    <tr>
        <th>ID Link</th>
        <th>Nama</th>
        <th>Pesan</th>
        <th>Waktu</th>
        <th>Reply</th>
        <th>Time</th>
        <th>Edit Reply</th>
        <th>Hapus</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($database['001']['pesan'] as $pesanId => $pesan) {
        $pesanText = $pesan['pesan'];
        $waktu = $pesan['waktu'];
        $reply = $pesan['reply'];
        $time = $pesan['time'];
        ?>
        <tr>
            <td><?php echo $pesanId; ?></td>
            <td><?php echo $database['001']['nama']; ?></td>
            <td><?php echo $pesanText; ?></td>
            <td><?php echo $waktu; ?></td>
            <td><?php echo $reply; ?></td>
            <td><?php echo $time; ?></td>
            <td>
                <form action="edit_reply.php" method="post">
                    <input type="hidden" name="id_link" value="001">
                    <input type="hidden" name="pesan_id" value="<?php echo $pesanId; ?>">
                    <input type="text" name="reply" value="<?php echo $reply; ?>">
                    <button type="submit">Save</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="pesan_id" value="<?php echo $pesanId; ?>">
                    <input type="hidden" name="remove" value="1">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
<div>
    <form action="" method="post">
        <button type="submit" name="hapus_semua">Hapus Semua</button>
    </form>
    <a href="AllData.php" class="w3-button w3-white">View All Data</a>
    <a href="../index.php" class="w3-button w3-red">back</a>
</div>
</body>
</html>
