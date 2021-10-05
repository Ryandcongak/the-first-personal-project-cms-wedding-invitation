<!DOCTYPE html>
<html lang="en">
<?php
require "function.php";
$query = query("SELECT * FROM blogs");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Love Wedding Invitation">
    <meta name="description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta name="keywords" content="undangan-nikah, undangan-pernikahan, platform-undangan-online">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content=" days">
    <meta name="author" content="love-weddinginvitation">

    <!-- Primary Meta Tags -->
    <title>Love Wedding Invitation - Undangan Pernikahan</title>
    <meta name="title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta name="description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://love-weddinginvitation.com/">
    <meta property="og:title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta property="og:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="og:image" content="assets/images/bg love.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://love-weddinginvitation.com/">
    <meta property="twitter:title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta property="twitter:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="twitter:image" content="assets/images/bg love.png">
    <title>Blog</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/wt0njrqvcyac1g9b4igb3zqx5wrxrc52xac5ex5mc5q2ziku/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<style>
    .signup-form {
        height: 500px;
        overflow-y: auto;
    }

    .signup-form::-webkit-scrollbar {
        width: 1em;
    }

    .signup-form::-webkit-scrollbar-track {
        background: #fff;
    }

    .signup-form::-webkit-scrollbar-thumb {
        background-color: #fff;
        outline: 1px solid #fff;
    }
</style>

<body>
    <div class="container mt-5">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Blog</h2>
                        <?php foreach ($query as $b) :
                            $deskripsi = html_entity_decode($b['content']); ?>
                            <div class="card my-4 float-end" style="width: 18rem;">
                                <img src="assets/images/blog/<?php echo $b['img_content']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $b['judul']; ?></h5>
                                    <p class="card-text"><?php echo substr($deskripsi, 0, 255); ?></p>
                                    <a href="blog-content.php?id=<?php echo $b['id']; ?>" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php require "menus.php"; ?>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution="install_email" attribution_version="biz_inbox" page_id="106268535044344">
</div>