<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan</title>
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
                        <h2 class="form-title">Syarat & Ketentuan</h2>
                        <p>Selamat datang di <b>Love Wedding Invitation</b></p>
                        <p>Disarankan sebelum mengakses dan menggunakan jasa Web App ini lebih jauh. Anda terlebih dahulu membaca dan memahami syarat dan ketentuan yang berlaku. Syarat dan ketentuan berikut adalah ketentuan dalam pengguna atau pengunjung situs, isi dan/atau konten, layanan, serta fitur lainnya yang ada di <b>www.love-weddinginvitation.com</b>. Dengan mengakses atau menggunakan situs <b>www.love-weddinginvitation.com</b>, informasi, atau aplikasi lainnya dalam bentuk mobile application yang disediakan oleh atau dalam situs, berarti anda telah memahami dan menyetujui serta terikat dan tunduk dengan segala syarat dan ketentuan yang berlaku di situs ini.</p>
                        <p>Hasil desain undangan yang telah dipesan di situs ini dapat digunakan sebagai media promosi/portfolio oleh <b>www.love-weddinginvitation.com</b> tanpa meminta persetujuan pemesan undangan terlebih dahulu.</p>
                        <p><b>Love Wedding Invitation</b> berhak menghapus data/desain undangan yang telah dibuat lebih dari 365 hari (1 Tahun) dihitung dari tanggal online pertama kali tanpa meminta persetujuan pemesan undangan terlebih dahulu.</p>
                        <p>Proses persetujuan login jika sudah melakukan pembayaran dan register akan di proses 1x24 jam setelah register dilakukan.</p>
                        <p>Dana yang telah dibayarkan untuk undangan tidak dapat di refund dengan alasan apapun.</p>
                        <p>Syarat, ketentuan & harga undangan dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</p>

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