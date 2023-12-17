<?php
if (isset($_GET['id'])) {
    $id_link = $_GET['id'];
} else {
    header('Location: ?id=001');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Anymore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        button#emcee {
            position: relative;
            z-index: 2;
        }

        :root {
            --body-bg: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --msger-bg: #fff;
            --border: 2px solid #ddd;
            --left-msg-bg: #ececec;
            --right-msg-bg: #579ffb;
        }

        body {
            min-height: 2000px;
        }


        .msg-bubble {
            max-width: 18em;
            padding: 1.5em;
            margin-left: 5.5em;
            border-radius: 3.1em;
            background: var(--left-msg-bg);
            background-color: aqua;
            text-align: right;
        }

        .msg-bubble2 {
            width: 15em;
            padding: 1.5em;
            border-radius: 2.5em;
            background: var(--left-msg-bg);
            background-color: yellow;
        }

        .msg-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10em;
        }

        .msg-info-time {
            font-size: 0.55em;
            text-align: right;
            font-color: black;
        }

        .msg-info-time2 {
            font-size: 0.55em;
            text-align: left;
            font-color: black;
        }

        .left-msg .msg-bubble {
            border-bottom-left-radius: 0;
        }

        .right-msg {
            flex-direction: row-reverse;
        }

        .msg-font {
            font-family: monaco;
            font-size: 3.1em;
        }

        .bordy {
            display: grid;
            place-items: right;
        }

        .BACK {
            background-image: url(bg.gif);
        }

        #write {
            width: 0;
            color: rgb(255, 255, 255);
            float: left;
            font-family: FiraFlott;
            font-weight: bold;
            font-size: 2.6em;
            overflow: hidden;
            white-space: nowrap;
            animation: write 5s steps(22) 1s infinite alternate;
        }

        #write span {
            color: rgb(216, 216, 108);
        }

        #scrips {
            float: left;
            color: rgb(159, 212, 247);
            font-family: FiraFlott;
            font-weight: bold;
            font-size: 2.6rem;
            animation: draw 0.5s linear 0s infinite;
            position: relative;
        }

        @keyframes write {
            from {
                width: 0ch;
            }

            to {
                width: 36ch;
            }
        }

        @keyframes draw {
            from {
                opacity: 0%;
            }

            to {
                opacity: 100%;
            }

        }

        .bord {
            display: grid;
            place-items: center;
        }

        ::-webkit-textarea-placeholder {
            display: inline-block;
            opacity: 0.2;
            transition: all 0.3s ease-in-out;
            padding-right: 15em;
            white-space: nowrap;
            width: 0ch;
            animation: write 5s steps(22) 1s infinite alternate;
        }

        .st {
            color: white;
        }

        .keterangan2,
        .keterangan3 {
            font-size: 3.1em;
            font-family: consolas;
        }

        .ketteng {
            font-size: 3.1em;
        }

        /* Atur tata letak teks */
        .leftXmsg {
            padding-right: 1em;
        }

        .centerXmsg {
            text-align: center;
            padding-left: 6em;
        }

        .rightXmsg {
            padding-left: 3em;
        }

        @media (max-width: 968px) {
            html {
                font-size: 53%;
            }

            .ex {
                display: none;
            }

            .mobile {
                font-size: 3em;

            }

            #scrips {
                float: left;
                color: rgb(159, 212, 247);
                font-family: FiraFlott;
                font-weight: bold;
                font-size: 1.9em;
                animation: draw 0.5s linear 0s infinite;
                position: relative;
            }

            #write {
                width: 0;
                color: rgb(255, 255, 255);
                float: left;
                font-family: FiraFlott;
                font-weight: bold;
                font-size: 1.7em;
                overflow: hidden;
                white-space: nowrap;
                animation: write 5s steps(22) 1s infinite alternate;
            }

            .mb {
                font-size: 2em;
            }

            .msg-bubble2 {
                width: 10em;
                padding: 1.5em;
                border-radius: 2.5em;
                background: var(--left-msg-bg);
                background-color: yellow;
            }

            .msg-bubble {
                max-width: 10em;
                padding: 1.5em;
                margin-left: 2.5em;
                border-radius: 3.1em;
                background: var(--left-msg-bg);
                background-color: aqua;
                text-align: right;
            }


            /* Atur tata letak teks */
            .leftXmsg {
                padding-right: 0.1em;
            }

            .centerXmsg {
                text-align: center;
                padding-left: 2.2em;
            }

            .rightXmsg {
                padding-left: 2.5em;
            }
        }
    </style>
</head>

<body class="BACK">
    <div class="container" style="max-width: 80rem;">
        <div class="card">
            <div class="card-header bg-dark">
                <div id="scrips"> [ </div>
                <h2 id="write">Hello...:D,<span> you can send us any message!</span></h2>
                <div id="scrips"> ] </div>
            </div>
            <div class="card-body bg-dark">
                <textarea name="" id="text-id" cols="0" rows="5" class="form-control bg-dark text-white mb"></textarea>
                <button class="btn btn-primary" onclick="sendMessage()">Send📩</button>
            </div>
        </div>
        <div class="card-footer bg-dark bord">
            <a href="?id=001" class="btn btn-primary">Reload🔄</a>
        </div>
    </div>
    <br>
    <div class="container" style="max-width: 80rem;">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <b class="keterangan2 leftXmsg">🙂 Reply</b>
                <b class="ketteng centerXmsg ex">|</b>
                <b class="keterangan3 rightXmsg">Message 🤔</b>
            </div>
            <div class="card-body bg-dark">
                <div id="pesan_masuk">
                    <?php
                    // Path file database.txt
                    $file = 'anonim/api/database/database.txt';

                    // Baca isi file database.txt
                    $data = file_get_contents($file);

                    // Dekode data menjadi array
                    $database = json_decode($data, true);

                    // Cek apakah id_link ada di database
                    if (isset($database[$id_link])) {
                        $pesan = $database[$id_link]['pesan'];
                        foreach ($pesan as $id => $dataPesan) {
                            echo '<div class="alert alert-primary msg-bubble msg-font mobile" role="alert">';
                            echo $dataPesan['pesan'];
                            echo '<br>';
                            echo '<div class="msg-info-time2">';
                            echo $dataPesan['waktu'];
                            echo '</div>';
                            echo '</div>';

                            // Cek apakah ada reply pada pesan
                            if (!empty($dataPesan['reply'])) {
                                echo '<div class="alert alert-warning msg-bubble2 right-msg msg-font mobile" role="alert">';
                                echo $dataPesan['reply'];
                                echo '<div class="msg-info-time">';
                                echo $dataPesan['time'];
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<h2 class="text-blue">Data tidak ditemukan</h2>';
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer bg-dark bording">
                <a href="https://api.whatsapp.com/send/?phone=62895616088828&text=hi+there!+I+hope+your're+doing+...+I+could+use+some+help+with...+if+you+have+a+moment,+could+you+kindly+assist+me+with+this?+your+support+would+be+greatly+appreciated.+Thank+you!&type=phone_number&app_absent=0"
                    class="btn btn-warning" style="margin-right: 300px;">More💬</a>
            </div>
        </div>
        <button onclick="location.href='anonim/administrator_menu.php'" id="emcee" class="btn btn-default"
            type="button">Admin</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
        let i = 0;
        let placeholder = "";
        const txt = "Mari kita isi kolom ini dengan komentar-komentar cerdas dan bijak🧐, bukan sekadar pujian kosong atau ujaran tanpa makna Kita bisa lebih dari sekadar memberi tepuk tangan 😊";
        const speed = 200;
        let reverse = false;

        function type() {
            if (!reverse) {
                // Menambahkan karakter pada placeholder saat animasi maju
                placeholder += txt.charAt(i);
                i++;

                // Jika mencapai akhir teks, mulai animasi mundur
                if (i === txt.length) {
                    reverse = true;
                }
            } else {
                // Menghapus karakter dari placeholder saat animasi mundur
                placeholder = placeholder.slice(0, -1);
                i--;

                // Jika mencapai awal teks, mulai animasi maju
                if (i === 0) {
                    reverse = false;
                }
            }

            // Menetapkan placeholder pada elemen input
            const textareaElement = document.getElementById("text-id");
            textareaElement.setAttribute("placeholder", placeholder);


            // Memanggil fungsi type() berdasarkan kecepatan yang ditentukan
            setTimeout(type, speed);
        }

        type();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        function sendMessage() {
            const textarea = document.getElementById("text-id");
            const message = textarea.value;
            const div_pesan = document.getElementById("pesan_masuk");
            const newPesan = document.createElement("div");
            // Validasi textarea kosong
            if (message.trim() === "") {
                alert("Please enter a message.");
                return;
            }
            newPesan.className = "alert alert-dark";
            newPesan.role = "alert";
            newPesan.innerText = message;
            div_pesan.appendChild(newPesan);
            textarea.value = "";

            // Simpan pesan ke dalam file database.txt
            $.post("anonim/api/save_message.php", { message: message, id_link: "<?php echo $id_link ?>" }, function (result, status) {
                if (status === "success") {
                    console.log("Pesan berhasil disimpan.");
                } else {
                    console.log("Gagal menyimpan pesan.");
                }
            });
        }

        function sendReply(id_pesan) {
            const replyInput = document.getElementById("reply-" + id_pesan);
            const replyMessage = replyInput.value;

            // Kirim reply pesan ke server
            $.post("anonim/api/save_reply.php", { id: id_pesan, replyMessage: replyMessage }, function (result, status) {
                if (status === "success") {
                    const parsedResult = JSON.parse(result);
                    if (parsedResult.status === 'success') {
                        // Tambahkan reply ke bawah pesan
                        const pesanDiv = document.getElementById("pesan-" + id_pesan);
                        const replyDiv = document.createElement("div");
                        replyDiv.className = "alert alert-primary";
                        replyDiv.role = "alert";
                        replyDiv.innerText = parsedResult.reply;
                        pesanDiv.appendChild(replyDiv);

                        // Kosongkan input reply
                        replyInput.value = "";
                    } else {
                        console.log("Gagal menyimpan reply.");
                    }
                } else {
                    console.log("Gagal menyimpan reply.");
                }
            });
        }
    </script>
    <script>
        var caller = $("#emcee"),
            box = $("#box");

        function foo() {
            var randX = Math.floor(Math.random() * (window.innerWidth - 100));
            var randY = Math.floor(Math.random() * (window.innerHeight - 100));
            console.log([randX, randY]);
            caller.stop().animate({ "left": randX + "px", "top": randY + "px" });

        }

        $(document).ready(function () {

            caller.on('mouseenter', foo);
            caller.on('click', function () {
                alert('clicked!');
            });

        });
    </script>

</html>