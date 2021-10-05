<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../function.php";
$id = $_GET['id'];
$query = query("SELECT * FROM profil_wanita WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  if (editsimpanwanita($_POST) > 0) {
    echo "<script>
        alert('Data berhasil di edit');
        document.location.href='profil.php';
        </script>";
  } else {
    echo "<script>
        alert('Data gagal di edit');
        document.location.href='profil.php';
        </script>";
  }
}
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
            Edit Profil Wanita
          </h2>

          <!-- Form Profil Pria -->
          <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Mempelai Pria
          </h4>
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>
              <input type="text" name="fotoProfilLama_wanita" value="<?php echo $query['foto_profil']; ?>" hidden>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="nama_lengkap" value="<?php echo $query['nama_lengkap']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Panggilan</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="nama_panggilan" value="<?php echo $query['nama_panggilan']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Facebook</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="facebook" value="<?php echo $query['facebook']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Instagram</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="instagram" value="<?php echo $query['instagram']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Twitter</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="twitter" value="<?php echo $query['twitter']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Anak ke</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="anak_ke" value="<?php echo $query['anak_ke']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Bapak</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="nama_bapak" value="<?php echo $query['nama_bapak']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Ibu</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="nama_ibu" value="<?php echo $query['nama_ibu']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Foto Profil</span>
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $query['foto_profil']; ?>" alt="" loading="lazy" />
                </div>
              </label>

              <label class="block mt-4 text-sm">
                <input type="file" name="foto_profil" id="foto_profil" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              </label>

              <div class="flex items-center text-sm">
                <label class="block mt-6 mb-6 text-sm">
                  <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                </label>

                <label class="block ml-6 mt-6 mb-6 text-sm">
                  <a href="profil.php" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Cancel</a>
                </label>
              </div>
            </form>
          </div>
        </div>
    </div>
    </main>
  </div>
  </div>
</body>

</html>