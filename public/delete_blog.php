<?php
// seesion start
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require "../function.php";

$id = $_GET["id"];

if (delete_blog($id) > 0) {
    echo "<script>
    alert ('Blog telah dihapus');
    document.location.href='blog_view.php';
    </script>";
} else {
    echo "<script>
    alert ('Blog gagal dihapus');
    document.location.href='blog_view.php';
    </script>";
}
