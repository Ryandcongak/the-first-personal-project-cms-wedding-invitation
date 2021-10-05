<?php
include_once 'function.php';
$x = query("SELECT * FROM contoh");
?>
<div class="signup-image">
    <a href="login.php" class="signup-image-link">I am already member</a>
    <a href="register.php" class="link-dark signup-image-link">Sign Up / Register</a><br>
    <figure><img src="assets/images/logos.png" width="50%" alt="sing up image"></figure>
    <a href="<?php foreach ($x as $xx) {
                    echo $xx['url'];
                } ?>" class="link-dark signup-image-link" target="_blank">Lihat Contoh Undangan</a><br>
    <a href="testimoni.php" class="link-dark signup-image-link">Testimoni</a><br>
    <a href="blog.php" class="link-dark signup-image-link">Blog</a><br>
    <a href="tentang_kami.php" class="link-dark signup-image-link">Tentang Kami</a><br>
    <a href="cara_pembayaran.php" class="link-dark signup-image-link">Cara Pembayaran</a><br>
    <a href="faq_bantuan.php" class="link-dark signup-image-link">FAQ / Pusat Bantuan</a><br>
    <a href="syarat_ketentuan.php" class="link-dark signup-image-link">Syarat & Ketentuan</a><br>
</div>