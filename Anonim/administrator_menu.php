<?php
// Path file database.txt
$file = 'api/database.txt';

// Baca isi file database.txt
$data = file_get_contents($file);

// Dekode data menjadi array
$database = json_decode($data, true);
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
    <script>
        var password = "15juli2023";

        (function passcodeprotect() {
            var passcode = prompt("Masukkan Admin_Code!!!");

            if (passcode === password) {
                alert('Welcome To The admin mode');
            } else {
                alert("Code Error 404, maaf anda bukan Admin !!!");
                forceRedirect();
            }
        }());

        // Fungsi untuk mengarahkan pengguna ke URL yang ditentukan
        function forceRedirect() {
            var url = '../index.php'; // Ganti dengan URL yang diinginkan
            window.location.href = url;
        }
    </script>
<h1>Database Viewer</h1>
<table>
    <thead>
    <tr class="bg-white">
        <th>ID Link</th>
        <th>Nama</th>
        <th>Pesan</th>
        <th>Waktu</th>
        <th>Reply</th>
        <th>Time</th>
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
        <tr class="bg-white">
            <td><?php echo $pesanId; ?></td>
            <td><?php echo $database['001']['nama']; ?></td>
            <td><?php echo $pesanText; ?></td>
            <td><?php echo $waktu; ?></td>
            <td><?php echo $reply; ?></td>
            <td><?php echo $time; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div>
    <center>
        <form action="" method="post">
            <a href="AllData.php" class="w3-button w3-white">View All Data</a>
            <br>
            <a href="edit.php" class="w3-button w3-lime">Edit-->></a>
            <br>
            <a href="../index.php" class="w3-button w3-red"><<--Back</a> 
        </form>
    </center>
</div>
</body>
</html>
