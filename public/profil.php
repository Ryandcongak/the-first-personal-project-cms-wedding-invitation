  <?php
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
  require "../function.php";
  $id_author = $_SESSION["users_id"];
  ?>

  <!DOCTYPE html>
  <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Love Wedding Invitation</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
  </head>

  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
      <!-- Desktop sidebar -->
      <?php require "sidebar.php";  ?>
      <div class="flex flex-col flex-1">
        <!-- header -->
        <?php require "header.php" ?>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              Profil
            </h2>
            <p class="mb-8 text-gray-600 dark:text-gray-400">
              Hi, <?php echo $_SESSION['username']; ?> di Halaman ini anda bisa mengganti Profil anda.

              <button class="flex px-6 py-1 mt-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><a href="../client/index.php?kode=<?php echo $id_author; ?>&fname=" target="_Blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                  </svg></a></button>
            </p>
            <!-- Form Profil Pria -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><a href="add_profil_pria.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg></button> Mempelai Pria
            </h4>
            <div class="px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <?php
              $query_pria = query("SELECT * FROM profil_pria WHERE id_users = '$id_author' ");
              foreach ($query_pria as $data_p) : ?>

                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['nama_lengkap']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Panggilan</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['nama_panggilan']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Facebook</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['facebook']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Instagram</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['instagram']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Twitter</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['twitter']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Anak ke</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['anak_ke']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Bapak</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['nama_bapak']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Ibu</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_p['nama_ibu']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Foto Profil</span>
                  <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $data_p['foto_profil']; ?>" alt="" loading="lazy" disabled />
                  </div>
                </label>

                <label class="block mt-6 mb-6 text-sm">
                  <a class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" href="edit_pria.php?id=<?php echo $data_p['id']; ?>" role="button">Edit Profil Pria</a>
                </label>

              <?php endforeach; ?>
            </div>
            <!-- Form Profil Wanita -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"><button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><a href="add_profil_wanita.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg></a></button> Mempelai Wanita
            </h4>
            <div class="px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
              <?php
              $query_wanita = query("SELECT * FROM profil_wanita WHERE id_users = '$id_author'");
              foreach ($query_wanita as $data_w) : ?>

                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['nama_lengkap']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Panggilan</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['nama_panggilan']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Facebook</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['facebook']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Instagram</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['instagram']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Twitter</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['twitter']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Anak ke</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['anak_ke']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Bapak</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['nama_bapak']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nama Ibu</span>
                  <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $data_w['nama_ibu']; ?>" disabled />
                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Foto Profil</span>
                  <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $data_w['foto_profil']; ?>" alt="" loading="lazy" />
                  </div>
                </label>

                <label class="block mt-6 mb-6 text-sm">
                  <a class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" href="edit_wanita.php?id=<?php echo $data_w['id']; ?>" role="button">Edit Profil Wanita</a>
                </label>
              <?php endforeach; ?>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>

  </html>