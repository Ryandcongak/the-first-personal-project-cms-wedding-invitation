<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location: login.php');
  exit;
}
require "../function.php";
$id_author = $_SESSION["users_id"];
// Pagination
$jumlahPerHalaman = 3;
$jumlahdata = count(query("SELECT * FROM guests WHERE id_users = '$id_author'"));
// round = Mmebultkan bilangan decimal terdekatnya
// floor = Membulatkan bilangan decimal kebawah
// ceil = Membulatkan bilangan decimal ke atas
$jumlahHalaman = ceil($jumlahdata / $jumlahPerHalaman);
// Sort code for if else
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahPerHalaman * $halamanaktif) - $jumlahPerHalaman;
// LIMIT nomor $array ke berapa, $batas array 
$query_sql = query("SELECT * FROM guests WHERE id_users = '$id_author' LIMIT $awalData,$jumlahPerHalaman");
$comments = count(query("SELECT * FROM comments WHERE id_users = '$id_author'"));

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Love Wedding Invitation - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <?php require "sidebar.php"; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- header -->
      <?php require "header.php"; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
          </h2>
          <p class="flex mb-8 text-gray-600 dark:text-gray-400">
            Hi, <span style="text-transform: uppercase;"><?php echo $_SESSION['username']; ?></span>. Klik icon menu <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg> diatas untuk mengedit Undangan. </p>
          <!-- Statistik Undangan -->
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Total List Undangan
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?php echo $jumlahdata; ?>
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Tamu Akan Hadir
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?php echo $comments; ?>
                </p>
              </div>
            </div>
          </div>


          <!-- Upload guests -->
          <div class="w-full mb-4 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto p-4">
              <form action="../proses_excel_upload.php" enctype="multipart/form-data" method="POST">
                <label for="fname" class="text-gray-700 dark:text-gray-200">Upload List Undangan :</label>
                <input type="file" id="file" name="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                <a href="../guest_name.xls" style="text-decoration: underline;" class="text-gray-700 dark:text-gray-200">After Upload Download Excel</a><br>
                <button type="submit" name="submit" class="px-5 py-1 mt-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" data-bs-toggle="tooltip" data-bs-placement="right" title="Klik disini untuk upload nama - nama tamu.">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                    <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                  </svg>
                </button>
              </form>
            </div>
          </div>

          <!-- Guest name custome -->
          <div class="w-full mb-4 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto p-4">
              <form action="../client/index.php" method="get" target="_blank">
                <label for="fname" class="text-gray-700 dark:text-gray-200">Guest name Custom without Excel :</label>
                <input type="hidden" name="kode" value="<?php echo $id_author; ?>">
                <input type="text" id="fname" name="fname" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="First and Last Name">
                <button type="submit" class="px-5 py-1 mt-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" data-bs-toggle="tooltip" data-bs-placement="right" title="Klik untuk mengirim undangan">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                  </svg>
                </button>
              </form>
            </div>
          </div>

          <!-- Table guest Automatic -->
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <!-- table -->
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Guest name</th>
                    <th class="px-4 py-3">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  foreach ($query_sql as $guest) : ?>

                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <form action="../client/index.php" method="get" target="_blank">
                            <input type="hidden" name="kode" value="<?php echo $id_author; ?>">
                            <input type="text" name="fname" id="fname" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $guest['nama_guest']; ?>" />
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <div class="flex items-center space-x-4 text-sm">
                          <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Send">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                          <?php
                          $namaTamuu = $guest['nama_guest'];
                          $hpTamuu = $guest['phone_guest'];
                          ?>
                          <a href="https://wa.me/<?php echo $hpTamuu ?>?text=%0A%0AKpd. Bpk/Ibu/Saudara/i%0A%0A<?php echo $namaTamuu; ?>
					%0A%0ATanpa%20mengurangi%20rasa%20hormat%2C%20perkenankan%20kami%20mengundang%20Bapak%2FIbu%2FSaudara%2Fi%2C%20teman%20sekaligus%20sahabat%2C%20untuk%20menghadiri%20acara%20pernikahan%20kami%20%3A%0A%0AYudha%20%26%20Viona%0A%0ABerikut%20link%20undangan%20kami%20untuk%20info%20lengkap%20dari%20acara%20bisa%20kunjungi%20%3A%0A%0A
					http://localhost/love_weddinginvitation/ryan-sahyuni/client/index.php?kode=<?php echo $id_author; ?>fname=
					<?php
                    $ex = $guest['nama_guest'];;
                    $tanda = "%2B";
                    $ganti = str_replace(" ", $tanda, $ex);
                    echo $ganti; ?>
					%0A%0AMerupakan%20suatu%20kebahagiaan%20bagi%20kami%20apabila%20Bapak%2FIbu%2FSaudara%2Fi%20berkenan%20untuk%20hadir%20dan%20memberikan%20doa%20restu.%0A%0AMohon%20maaf%20perihal%20undangan%20hanya%20di%20bagikan%20melalui%20%20pesan%20ini.%20Karena%20suasana%20masih%20pandemi%20diharapakan%20untuk%20menggunakan%20masker%20dan%20datang%20pada%20jam%20yang%20telah%20ditentukan.%20Terima%20kasih%20banyak%20atas%20perhatiannya.%0A%0A%0ATerima%20Kasih."><svg class="w-6 h-6 text-blue-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                            </svg></a>

                          <a href="delete_guest.php?id=<?php echo $guest["id"]; ?>" onclick="return confirm('Yakin untuk menghapus?');" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                          </a>
                        </div>
                      </td>
                    </tr>
                    </form>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- pagination -->
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
              <span class="flex items-center col-span-3">
                Showing <?php echo $jumlahPerHalaman ?> of <?php echo $jumlahdata ?>
              </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <!-- Pagination mundur -->
                    <?php if ($halamanaktif > 1) : ?>
                      <li>
                        <a href="?halaman=<?= $halamanaktif - 1; ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue" aria-label="Previous">
                          <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                      <?php if ($i == $halamanaktif) : ?>
                        <li>
                          <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                            <?= $i; ?>
                          </a>
                        </li>
                      <?php else : ?>
                        <li>
                          <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                            <?= $i; ?>
                          </a>
                        </li>
                      <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanaktif < $jumlahHalaman) : ?>
                      <li>
                        <a href="?halaman=<?= $halamanaktif + 1; ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue" aria-label="Next">
                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                          </svg>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </span>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
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