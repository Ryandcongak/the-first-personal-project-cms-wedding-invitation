<?php
// seesion start
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
if (isset($_POST['submit'])) {
    include "function.php";
    include "assets/library/excel_reader2.php";

    $id_author = $_SESSION['users_id'];

    // upload file xls
    $target = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);

    // beri permisi agar file xls dapat di baca
    chmod($_FILES['file']['name'], 0777);

    // mengambil isi file xls
    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'], false);
    // menghitung jumlah baris data yang ada
    $jumlah_baris = $data->rowcount($sheet_index = 0);

    // jumlah default data yang berhasil di import
    $berhasil = 0;
    for ($i = 2; $i <= $jumlah_baris; $i++) {

        // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
        $nama     = $data->val($i, 1);
        $phone   = $data->val($i, 2);

        if ($nama != "" && $phone != "") {
            // input data ke database (table data_pegawai)
            mysqli_query($conn, "INSERT INTO `guests` (`id`, `nama_guest`, `phone_guest`, `id_users`) VALUES ( '', '$nama', '$phone', '$id_author'); ");
            $berhasil++;
        }
    }

    // hapus kembali file .xls yang di upload tadi
    unlink($_FILES['file']['name']);

    // alihkan halaman ke index.php
    echo "<script>window.alert('sukses import $berhasil data!')</script>";
    echo "<script>window.location='public/index.php'</script>";
}
