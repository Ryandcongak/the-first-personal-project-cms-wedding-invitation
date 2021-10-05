<?php
// seesion start
session_start();
require "../function.php";
$id_author = $_GET['kode'];
$query_modal_pria = query("SELECT * FROM profil_pria WHERE id_users = '$id_author'");
$query_modal_wanita = query("SELECT * FROM profil_wanita WHERE id_users = '$id_author'");
$sql_resepsi = query("SELECT * FROM resepsi WHERE id_users = '$id_author'");
$sql_gf = query("SELECT * FROM galleries_foto WHERE id_users = '$id_author'");
$sql_gv = query("SELECT * FROM galleries_video WHERE id_users = '$id_author'");
?>
<!DOCTYPE html">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title><?php foreach ($query_modal_pria as $pria) {
				echo $pria['nama_panggilan'];
			} ?> & <?php foreach ($query_modal_wanita as $wanita) {
						echo $wanita['nama_panggilan'];
					} ?> | Undangan Pernikahan </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- HTML Meta Tags -->
	<meta name="description" content="Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir pada acara pernikahan kami.">

	<!-- Google / Search Engine Tags -->
	<meta itemprop="name" content=" <?php foreach ($query_modal_pria as $pria) {
										echo $pria['nama_panggilan'];
									} ?> & <?php foreach ($query_modal_wanita as $wanita) {
												echo $wanita['nama_panggilan'];
											} ?> | Undangan Pernikahan">
	<meta itemprop="description" content="Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir pada acara pernikahan kami.">
	<meta itemprop="image" content="http://love-weddinginvitation.com/images/<?php foreach ($sql_resepsi as $rsp) {
																					echo $rsp['bg_header'];
																				} ?>">

	<!-- Facebook Meta Tags -->
	<meta property="og:url" content="http://love-weddinginvitation.com/index.php?kode=<?php echo $id_author; ?>&fname=<?php $ex = $_REQUEST['fname'];
																														echo $ex; ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content=" <?php foreach ($query_modal_pria as $pria) {
											echo $pria['nama_panggilan'];
										} ?> & <?php foreach ($query_modal_wanita as $wanita) {
													echo $wanita['nama_panggilan'];
												} ?> | Undangan Pernikahan">
	<meta property="og:description" content="Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir pada acara pernikahan kami.">
	<meta property="og:image" content="http://love-weddinginvitation.com/images/<?php foreach ($sql_resepsi as $rsp) {
																					echo $rsp['bg_header'];
																				} ?>">
	<meta property="og:image:url" content="http://love-weddinginvitation.com/images/<?php foreach ($sql_resepsi as $rsp) {
																						echo $rsp['bg_header'];
																					} ?>">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php foreach ($query_modal_pria as $pria) {
											echo $pria['nama_panggilan'];
										} ?> & <?php foreach ($query_modal_wanita as $wanita) {
													echo $wanita['nama_panggilan'];
												} ?> | Undangan Pernikahan">
	<meta name="twitter:description" content="Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir pada acara pernikahan kami.">
	<meta name="twitter:image" content="http://love-weddinginvitation.com/images/<?php foreach ($sql_resepsi as $rsp) {
																						echo $rsp['bg_header'];
																					} ?>">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="http://love-weddinginvitation.com/public/assets/img/logos.png">

	<link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="rsvp.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php foreach ($sql_resepsi as $bg) : ?>
		<style>
			.modal-open.modal {
				overflow-x: hidden;
				overflow-y: auto;
				padding: 0px !important;
			}

			.fade.in {
				opacity: 0.89;
			}

			.modal {
				position: fixed;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				z-index: 1050;
				outline: 0;
				background: url("images/<?php echo $bg['bg_awal']; ?>")no-repeat;
				background-size: 100%;
			}

			.fade {
				transition-property: opacity;
				transition-duration: 0.15s;
				transition-timing-function: linear;
				transition-delay: 0s;
			}

			.modal-overlay {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				/* background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.66) 0%, #ffffff 100%); */
			}

			.modal-copyright {
				color: black;
			}

			/* Music */
		</style>
	<?php endforeach; ?>

</head>

<body>
	<!-- Modal -->
	<div class="modal fade in text-center" id="modal_undangan" tabindex="-1" role="dialog" aria-hidden="true" style="display: block; padding-right: 0px;">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-overlay">
					<div class="modal-body text-center">
						<h2 class="modal-heading" style="color: palevioletred;">Undangan Pernikahan</h2>
						<h1 style="font-size: 85px; color: palevioletred;"><?php foreach ($query_modal_pria as $pria) {
																				echo $pria['nama_panggilan'];
																			} ?><br>&amp;<br><?php foreach ($query_modal_wanita as $wanita) {
																									echo $wanita['nama_panggilan'];
																								} ?></h1>
						<br>
						<p>Kpd. Bpk/Ibu/Saudara/i</p>
						<!-- js -->
						<script>
							function getUrlVars(param = null) {
								if (param !== null) {
									var vars = [],
										hash;
									var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
									for (var i = 0; i < hashes.length; i++) {
										hash = hashes[i].split('=');
										vars.push(hash[0]);
										vars[hash[0]] = hash[1];
									}
									return vars[param];
								} else {
									return null;
								}
							}
						</script>
						<h1 id="nama"></h1>
						<script>
							var param1 = getUrlVars("fname");
							var parameter = param1.replace("+", " ");
							document.getElementById("nama").innerHTML = parameter;
						</script>

						<p>Tanpa mengurangi rasa hormat, kami mengundang anda untuk hadir pada acara pernikahan kami.
						</p>
						<br>
						<br>
						<button type="button" class="btn btn-primary btn-modal music-button" id="button-modal" data-dismiss="modal">
							Buka Undangan
						</button>
						<?php $sql_music = query("SELECT * FROM resepsi WHERE id_users='$id_author'");
						foreach ($sql_music as $m) : ?>
							<audio src="music/<?php echo $m['music']; ?>"></audio>
						<?php endforeach; ?>
						<button id="button" hidden>
							<i class="fas fa-volume-up"></i>
						</button>
					</div> <!-- End Modal Body -->

					<span class="modal-copyright">
						Made with ♥ by
						<a href="http://love-weddinginvitation.com/" target="_blank" class="modal-link">Love Wedding
							Invitation</a>
					</span>
					<br>
					<a href="whatsapp://send?text=%0A%0AKpd. Bpk/Ibu/Saudara/i%0A%0A
					<?php
					$ex = $_REQUEST['fname'];
					echo $ex; ?>
					%0A%0ATanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bapak%2FIbu%2FSaudara%2Fi%2C%20teman%20sekaligus%20sahabat%2C%20untuk%20menghadiri%20acara%20pernikahan%20kami%20%3A%0A%0A<?php foreach ($query_modal_pria as $pria) {
																																																									echo $pria['nama_panggilan'];
																																																								} ?>%20%26%20<?php foreach ($query_modal_wanita as $wanita) {
																																																													echo $wanita['nama_panggilan'];
																																																												} ?>%0A%0ABerikut%20link%20undangan%20kami%20untuk%20info%20lengkap%20dari%20acara%20bisa%20kunjungi%20%3A%0A%0A
					https://love-weddinginvitation.com/client/index.php?kode=<?php echo $id_author; ?>%26fname=
					<?php
					$ex = $_GET['fname'];
					$tanda = "%2B";
					$ganti = str_replace(" ", $tanda, $ex);
					echo $ganti; ?>
					%0A%0AMerupakan%20suatu%20kebahagiaan%20bagi%20kami%20apabila%20Bapak%2FIbu%2FSaudara%2Fi%20berkenan%20untuk%20hadir%20dan%20memberikan%20doa%20restu.%0A%0AMohon%20maaf%20perihal%20undangan%20hanya%20di%20bagikan%20melalui%20%20pesan%20ini.%20Karena%20suasana%20masih%20pandemi%20diharapakan%20untuk%20menggunakan%20masker%20dan%20datang%20pada%20jam%20yang%20telah%20ditentukan.%20Terima%20kasih%20banyak%20atas%20perhatiannya.%0A%0A%0ATerima%20Kasih.">Share via Whatsapp</a>

				</div> <!-- End Modal Overlay -->

			</div> <!-- End Modal Content -->

		</div> <!-- End Modal Dialog -->
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#modal_undangan').modal('show');
		});
	</script>
	<!-- End Modal -->
	<!-- Music -->
	<script>
		const button = document.querySelector(".music-button");
		const icon = document.querySelector("#button > i");
		const audio = document.querySelector("audio");

		button.addEventListener("click", () => {
			if (audio.paused) {
				audio.volume = 0.2;
				audio.play();
				icon.classList.remove('fa-volume-up');
				icon.classList.add('fa-volume-mute');

			} else {
				audio.pause();
				icon.classList.remove('fa-volume-mute');
				icon.classList.add('fa-volume-up');
			}
			button.classList.add("fademusic");
		});
	</script>
	<!-- End Music -->

	<div id="fh5co-wrapper">
		<div id="fh5co-page">

			<div class="fh5co-hero" data-section="home">
				<div class="fh5co-overlay"></div>
				<?php
				foreach ($sql_resepsi as  $bg_h) : ?>
					<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(images/<?php echo $bg_h['bg_header']; ?>);">
					<?php endforeach; ?>
					<div class="display-t">
						<div class="display-tc">
							<div class="container">
								<div class="col-md-10 col-md-offset-1">
									<div class="animate-box">
										<h1>The Wedding of</h1>
										<h2><?php foreach ($query_modal_pria as $pria) {
												echo $pria['nama_panggilan'];
											} ?><br>&amp;<br><?php foreach ($query_modal_wanita as $wanita) {
																	echo $wanita['nama_panggilan'];
																} ?></h2>
										<?php
										foreach ($sql_resepsi as $resepsi) : ?>
											<p><span><?php echo $resepsi['tanggal']; ?> <?php echo $resepsi['bulan']; ?> <?php echo $resepsi['tahun']; ?></span></p>
										<?php endforeach; ?>
										<p>
											<br>

										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
			</div>

			<header id="fh5co-header-section" class="sticky-banner">
				<div class="container">
					<div class="nav-header">
						<h1 id="fh5co-logo" style="color: #F69D9D;">Dari yang berbahagia</h1>
					</div>
				</div>
			</header>

			<!-- end:header-top -->

			<div id="fh5co-couple" class="fh5co-section-gray">
				<div class="container">
					<div class="row row-bottom-padded-md animate-box">
						<div class="col-md-6 col-md-offset-3 text-center">
							<!-- Mempelai Pria -->
							<div class="col-md-5 col-sm-5 col-xs-5 nopadding">
								<img src="images/<?php foreach ($query_modal_pria as $pria) {
														echo $pria['foto_profil'];
													} ?>" class="img-responsive">
								<h3><?php foreach ($query_modal_pria as $pria) {
										echo $pria['nama_lengkap'];
									} ?></h3>
								<p>Putra <?php foreach ($query_modal_pria as $pria) {
												echo $pria['anak_ke'];
											} ?> dari
									<br><?php foreach ($query_modal_pria as $pria) {
											echo $pria['nama_bapak'];
										} ?>
									<br> dengan
									<br><?php foreach ($query_modal_pria as $pria) {
											echo $pria['nama_ibu'];
										} ?></br>
								<p class="fh5co-social-icons">
									<a href="https:///www.facebook.com/<?php foreach ($query_modal_pria as $pria) {
																			echo $pria['facebook'];
																		} ?>" target="_blank"><i class="icon-facebook2"></i></a>
									<a href="https://twitter.com/<?php foreach ($query_modal_pria as $pria) {
																		echo $pria['twitter'];
																	} ?>" target="_blank"><i class="icon-twitter2"></i></a>
									<a href="https://www.instagram.com/<?php foreach ($query_modal_pria as $pria) {
																			echo $pria['instagram'];
																		} ?>" target="_blank"><i class="icon-instagram"></i></a>
								</p>
							</div>
							<!-- Mempelai Wanita -->
							<div class="col-md-2 col-sm-2 col-xs-2 nopadding">
								<h2 class="amp-center"><i class="icon-heart"></i></h2>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-5 nopadding">
								<img src="images/<?php foreach ($query_modal_wanita as $wanita) {
														echo $wanita['foto_profil'];
													} ?>" class="img-responsive">
								<h3><?php foreach ($query_modal_wanita as $wanita) {
										echo $wanita['nama_lengkap'];
									} ?></h3>
								<p>Putri <?php foreach ($query_modal_wanita as $wanita) {
												echo $wanita['anak_ke'];
											} ?> dari
									<br><?php foreach ($query_modal_wanita as $wanita) {
											echo $wanita['nama_bapak'];
										} ?>
									<br>dengan
									<br><?php foreach ($query_modal_wanita as $wanita) {
											echo $wanita['nama_ibu'];
										} ?> <br>
								<p class="fh5co-social-icons">
									<a href="https://twitter.com/<?php foreach ($query_modal_wanita as $wanita) {
																		echo $wanita['instagram'];
																	} ?>" target="_blank"><i class="icon-twitter2"></i></a>
									<a href="https://www.facebook.com/<?php foreach ($query_modal_wanita as $wanita) {
																			echo $wanita['facebook'];
																		} ?>"><i class="icon-facebook2"></i></a>
									<a href="https://www.instagram.com/<?php foreach ($query_modal_wanita as $wanita) {
																			echo $wanita['instagram'];
																		} ?>"><i class="icon-instagram"></i></a>
								</p>
								</p>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2">
							<?php $sql_resepsi = query("SELECT * FROM resepsi WHERE id_users='$id_author'");
							foreach ($sql_resepsi as  $resepsi) : ?>
								<div class="col-md-12 text-center heading-section">
									<h2><?php echo $resepsi['kalimat_pembuka']; ?></h2>
									<p><?php echo $resepsi['kalimat']; ?></p>

									<br>

									<p><u>RESEPSI</u></p>
									<p><strong>Hari/Tanggal : <?php echo $resepsi['hari']; ?>, <?php echo $resepsi['tanggal']; ?> <?php echo $resepsi['bulan']; ?> <?php echo $resepsi['tahun']; ?></strong></p>
									<p><strong>Pukul : <?php echo $resepsi['jam']; ?></strong></p>
									<p><strong>Tempat : <?php echo $resepsi['tempat']; ?></strong></p>
									<br>
									<p>Merupakan suatu kehormatan dan kebahagiaan kami apabila Bapak/Ibu/Saudara/i berkenan
										hadir memberikan doa restu.</p>
								</div>
								<div class="col-md-12 text-center heading-section">
									<h1>Pengingat dan Lokasi</h1>
									<a target="_blank" href="<?php echo $resepsi['pengingat']; ?>"><button class="btn btn-primary btn-block">Buat pengingat</button></a>
									<br>
									<a target="_blank" href="<?php echo $resepsi['maps_link']; ?>" class="btn btn-primary btn-block">Open in Maps</button></a>
									<iframe src="<?php echo $resepsi['maps_frame']; ?>" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
									<br>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div id="fh5co-gallery">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h2>Wedding Gallery</h2>
						</div>
					</div>
					<div class="flex row">
						<?php foreach ($sql_gf as $gf) : ?>
							<div class="col-md-4">
								<div class="gallery animate-box">
									<a class="gallery-img image-popup image-popup" href="images/<?php echo $gf['foto']; ?>"><img src="images/<?php echo $gf['foto']; ?>" class="img-responsive"></a>
								</div>
								<?php foreach ($sql_gv as $gv) : ?>
									<div class="gallery animate-box">
										<video controls autoplay loop style="width: 100%;border-radius: 2%;" src="video/<?php echo $gv['video']; ?>"></video>
										<a class="gallery-img image-popup" href="video/<?php ?>"><img src="video/<?php ?>" class="img-responsive"></a>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div id="fh5co-countdown">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box">
						<h1 style="color: aliceblue;">Hari Bahagia</h1>
						<p id="demo" hidden></p>
						<p class="countdown">
							<span id="days"></span>
							<span id="hours"></span>
							<span id="minutes"></span>
							<span id="seconds"></span>
						</p>
						<br><br>
						<br>
						<h1 data-aos="fade-up" data-aos-duration="2000" style="color: honeydew;" class="aos-init">
							Protokol Covid-19</h1>
						<p data-aos="fade-up" data-aos-duration="2000" class="aos-init" style="color: honeydew;">
							Tanpa mengurangi rasa hormat, dikarenakan situasi yang sedang terjadi ditengah Pandemi
							Covid-19 ini kami memohon maaf karena acara akan diselenggarakan sesuai peraturan dan
							himbauan pemerintah.
							<br><br>
							<img class="banner-covid" src="images/covid.png" width="100%">
							<br><br>
							<span style="text-transform: uppercase; color: honeydew;">
								- Membersihkan Tangan <br>
								- Memakai Masker <br>
								- Menjaga Jarak <br><br>
							</span>

							<span style="color:honeydew; font-style: italic; font-weight: 700; font-size: 13px;">Mari
								kita lindungi kesehatan bersama.</span>
						</p>
					</div>
				</div>
			</div>
			<?php
			foreach ($sql_resepsi as  $bg_f) : ?>
				<div id="fh5co-started" style="background-image:url(images/<?php echo $bg_f['bg_footer']; ?>);" data-stellar-background-ratio="0.5">
				<?php endforeach; ?>
				<div class="overlay"></div>
				<div class="container">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center heading-section">
							<h2>Kirim Ucapan</h2>
							<p>Katakan sesuatu untuk kedua mempelai</p>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-10 col-md-offset-1">
							<?php
							if (isset($_POST["send"])) {
								kirim_komentar($_POST);
							}
							?>
							<form class="form-inline" method="POST" action="">
								<div class="col-md-12 col-sm-12 text-center">
									<input type="text" name="name_comment" value="<?php echo $ex; ?>" hidden>
									<div class=" form-check form-check-inline" style="color: #F69D9D;">
										<input class="form-check-input" type="radio" name="come_or_not" id="inlineRadio1" value="hadir" checked>
										<label class="form-check-label" for="inlineRadio1"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-emoji-heart-eyes-fill" viewBox="0 0 16 16">
												<path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.559 5.448a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zm-.07-5.448c1.397-.864 3.543 1.838-.953 3.434-3.067-3.554.19-4.858.952-3.434z" />
											</svg> Hadir</label>
										<input class="form-check-input" type="radio" name="come_or_not" id="inlineRadio2" value="nggak">
										<label class="form-check-label" for="inlineRadio2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-emoji-frown-fill" viewBox="0 0 16 16">
												<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm-2.715 5.933a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 0 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z" />
											</svg> Nggak Hadir</label>
									</div>
									<div class="mb-3">
										<textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" placeholder="Kirim Ucapanmu" required></textarea>
									</div>
									<button type="submit" name="send" class="btn mt-4" style="background-color: #F69D9D;">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
				<footer>
					<div id="footer">
						<div class="container">
							<div class="row">
								<div class="col-md-12 text-center">
									<h2><?php foreach ($query_modal_pria as $pria) {
											echo $pria['nama_lengkap'];
										} ?>
										<br>&amp;
										<br><?php foreach ($query_modal_wanita as $wanita) {
												echo $wanita['nama_lengkap'];
											} ?>
									</h2>
								</div>
								<div class="col-md-6 col-md-offset-3 text-center">
									<p>All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="#" target="_blank">www.love-weddinginvitation.com</a></p>
								</div>
							</div>
						</div>
					</div>
				</footer>

				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="xnlS4WNM"></script>

		</div>
		<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false">
	</script>

	<script src="js/main.js"></script>
	<script src="dist/scripts.min.js"></script>

	<script>
		document.addEventListener('contextmenu', event => event.preventDefault());
		$(document).ready(function() {

			// Set the date we're counting down to
			<?php $sql_resepsi = query("SELECT * FROM resepsi WHERE id_users='$id_author'");
			foreach ($sql_resepsi as  $resepsi) : ?>
				var countDownDate = new Date("<?php echo $resepsi['tanggal']; ?> <?php echo $resepsi['bulan']; ?>,<?php echo $resepsi['tahun']; ?> 10:00:00").getTime();
			<?php endforeach; ?>
			// Update the count down every 1 second
			var x = setInterval(function() {

				// Get todays date and time
				var now = new Date().getTime();

				// Find the distance between now an the count down date
				var distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Display the result in an element with id="demo"
				document.getElementById("days").innerHTML = days + " <small>days</small>";
				document.getElementById("hours").innerHTML = hours + " <small>hours</small> ";
				document.getElementById("minutes").innerHTML = minutes + " <small>minutes</small> ";
				document.getElementById("seconds").innerHTML = seconds + " <small>seconds</small> ";

				// Display the result in an element with id="demo"
				document.getElementById("demo").innerHTML = days + "Days " + hours + "Hours " +
					minutes + "Minutes " + seconds + "Seconds ";

				// If the count down is finished, write some text 
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo").innerHTML = "The Wedding Ceremony is Over";
				}
			}, 1000);
		});
	</script>
</body>

</html>