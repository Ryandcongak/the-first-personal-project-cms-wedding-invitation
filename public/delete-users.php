<?php
// seesion start
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "../function.php";

$id = $_GET["id"];

if (delete_users($id) > 0) {
    echo "<script>
    alert ('Data telah dihapus');
    document.location.href='aksi.php';
    </script>";
} else {
    echo "<script>
    alert 'Data gagal dihapus';
    document.location.href='aksi.php';
    </script>";
}
