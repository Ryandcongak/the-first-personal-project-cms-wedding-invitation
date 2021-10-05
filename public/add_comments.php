<?php
// seesion start
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "../function.php";
if (isset($_POST["sendComment"])) {

    if (kirim_komentar($_POST) > 0) {
        echo "<script>
    alert('Data berhasil disimpan');
    </script>";
    } else {
        echo "<script>
    alert('Data gagal disimpan');
    </script>";
    }
}
