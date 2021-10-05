<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Pembayaran</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Cara Pembayaran</h2>
                        <h4>Hanya dengan Rp 250.000,-</h4>
                        <p>Silakan melakukan pembayaran hanya dengan Rp.250.000,- ke nomer Rekening dibawah, pastikan nomor rekening dan nama pemilik rekening yang anda tuju sudah benar dan upload bukti pembayaran saat register beserta nominal transfer anda dan Tim kami akan segera menyetujui akses login anda.</p>
                        <p><a href="register.php">Sign Up/Register</a> setelah melakukan pembayaran.</p>
                        <figure class="figure">
                            <img src="assets/images/BNI Card.png" class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption">Transfer Bank BNI</figcaption>
                        </figure><br>
                        <figure class="figure">
                            <img src="assets/images/BRI Card.png" class="figure-img img-fluid rounded" alt="...">
                            <figcaption class="figure-caption">Transfer Bank BRI</figcaption>
                        </figure>
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