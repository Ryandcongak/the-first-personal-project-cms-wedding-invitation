<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php
        if (isset($_POST["register"])) {
            if (registrasi($_POST) > 0) {
                echo "<div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>Register Berhasil!</h4>
                <p><i>Email telah terkirim.</i></p><p>Silakan Login masukan Username dan Password.</p>
                <hr>
                <p class'mb-0'><a href='login.php'>Sign Up/Login Sekarang</a></p>
              </div>";
                include("mail.php");
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <p>Silakan melakukan pembayaran sebelum anda sign up/ register. <br>
                            <a href="cara_pembayaran.php">Cara Pembayaran</a>
                        </p>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Your Phone" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="card"><i class="zmdi zmdi-card"></i></label>
                                <input type="text" name="atas_nama" id="atas_nama" placeholder="Transfer on behalf  " required />
                            </div>
                            <div class="form-group">
                                <p><b>Proof of Bank Transfer</b></p>
                                <label for="ss-transfer"><i class="zmdi zmdi-camera"></i></label>
                                <input type="file" name="ss_transfer" id="ss_transfer" placeholder="Proof of Bank Transfer" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password2" id="re_pass" placeholder="Repeat your password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <?php require "menu.php"; ?>
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