<!DOCTYPE html>
<html lang="en">
<?php
require "function.php";
$id = $_GET['id'];
$query = query("SELECT * FROM blogs WHERE id = $id");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="<?php foreach ($query as $j) {
                                    $j['judul'];
                                } ?>">
    <meta name="description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta name="keywords" content="undangan-nikah, undangan-pernikahan, platform-undangan-online">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content=" days">
    <meta name="author" content="love-weddinginvitation">

    <!-- Primary Meta Tags -->
    <title>Love Wedding Invitation - Undangan Pernikahan</title>
    <meta name="title" content="<?php foreach ($query as $j) {
                                    $j['judul'];
                                } ?>">
    <meta name="description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://love-weddinginvitation.com/">
    <meta property="og:title" content="<?php foreach ($query as $j) {
                                            $j['judul'];
                                        } ?>">
    <meta property="og:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="og:image" content="assets/images/<?php foreach ($query as $j) {
                                                            $j['img_content'];
                                                        } ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://love-weddinginvitation.com/">
    <meta property="twitter:title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta property="twitter:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="twitter:image" content="assets/images/<?php foreach ($query as $j) {
                                                                $j['img_content'];
                                                            } ?>">

    <title>Blog</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/wt0njrqvcyac1g9b4igb3zqx5wrxrc52xac5ex5mc5q2ziku/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="fixed-top bg-white">
            <button class="flex px-6 py-1 mt-1 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-blue-600 rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                <a href="blog.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>Back to Menu</button>
            <hr>
            <h2 class="form-title text-center">BLOG</h2>
            <hr>
        </div>
        <?php foreach ($query as $b) :
            $deskripsi = html_entity_decode($b['content']); ?>
            <div class="card" style="top: 120px;">
                <div class="card-header">
                    <h3><?php echo $b['judul']; ?></h3>
                </div>
                <div class="card-body">
                    <div class="card mx-auto d-block" style="width: 50%;">
                        <img src="assets/images/blog/<?php echo $b['img_content']; ?>" class="card-img-top" alt=" ...">
                    </div>
                    <blockquote class="blockquote mb-0">
                        <p><?php echo $deskripsi; ?></p>
                        <footer class="blockquote-footer">Date <cite title="Source Title"><?php echo $b['date']; ?></cite></footer>
                    </blockquote>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>