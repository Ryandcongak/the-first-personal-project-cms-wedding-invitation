<?php
// seesion start
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "../function.php";

$id = $_GET["id"];

if (delete_gv($id) > 0) {
    echo "<script>
    alert ('Video telah dihapus');
    document.location.href='galleries.php';
    </script>";
} else {
    echo "<script>
    alert ('Video gagal dihapus');
    document.location.href='galleries.php';
    </script>";
}
