<?php
// create session for login and other page
// session start
session_start();
// koneksi database
require "function.php";
// cek cookie
if (isset($_COOKIE['en']) && isset($_COOKIE['key'])) {
    $en = $_COOKIE['en'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $en");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// session
if (isset($_SESSION["login"])) {
    header('Location: public/index.php');
    exit;
}

// jika isset atau diset login
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username di database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND tingkat='0' AND aksi = '1'");
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["users_id"] = $row["id"];
            // cek remember me
            if (isset($_POST["remember"])) {
                // set cookie
                // setcookie('login', 'true', time() + 280);
                setcookie('en', $row['id'], time() + 140);
                setcookie('key', hash('sha256', $row['username']), time() + 140);
            }
            // masuk ke index jika password di verifikasi ada
            $_SESSION['username'] = $username;
            header('Location: public/index.php');
            exit;
        }
    }
    $error = true;
}

if (isset($_SESSION["login"])) {
    header('Location: public/aksi.php');
    exit;
}
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username di database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND tingkat  ='1' AND aksi = '1'");
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["users_id"] = $row["id"];
            // cek remember me
            if (isset($_POST["remember"])) {
                // set cookie
                // setcookie('login', 'true', time() + 280);
                setcookie('en', $row['id'], time() + 140);
                setcookie('key', hash('sha256', $row['username']), time() + 140);
            }
            // masuk ke index jika password di verifikasi ada
            $_SESSION['username'] = $username;
            header('Location: public/aksi.php');
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

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
    <meta name="title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta name="description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://love-weddinginvitation.com/">
    <meta property="og:title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta property="og:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="og:image" content="assets/images/logos.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://love-weddinginvitation.com/">
    <meta property="twitter:title" content="Love Wedding Invitation - Undangan Pernikahan">
    <meta property="twitter:description" content="hadir sebagai sebuah platform web application yang menawarkan solusi bagi kalian yang berencana membuat Undangan Online">
    <meta property="twitter:image" content="assets/images/logos.png">
    <title>Login</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>

<body>
    <div class="container mt-5">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <a href="register.php" class="signup-image-link" style="font-size: 22px;font-weight: 400;">Create an account</a>
                        <a href="register.php" class="signup-image-link" style="font-size: 18px;font-weight: 400;text-decoration:none;">View Invitation</a>
                        <figure><a href="https://love-weddinginvitation.com/client/index.php?kode=2&fname=Nama+Tamu" target="_blank"><img src="assets/images/bg love.png" id="img-login" alt="sing up image"></a></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Username" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                        <br>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Username / Password is wrong or <b>Admin is processing your account approval! <br><a href="cara_pembayaran.php">Cara Pembayaran</a></b>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="nav-footer">
                    <ul>
                        <li><a href="#">Tutorial</a></li>
                        <li><a href="cara_pembayaran.php">Cara Pembayaran</a></li>
                        <li><a href="faq_bantuan.php">FAQ / Pusat Bantuan</a></li>
                        <li><a href="syarat_ketentuan.php">Syarat & Ketentuan</a></li>
                        <li><a href="testimoni.php">Testimoni</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="tentang_kami.php">Tentang Kami</a></li>
                    </ul>
                </div>
                <br><br>
            </div>
        </section>

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