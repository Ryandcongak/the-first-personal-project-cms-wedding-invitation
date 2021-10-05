<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../function.php";
$id = $_GET['id'];
$query = query("SELECT * FROM galleries_video WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  if (edit_video($_POST) > 0) {
    echo "<script>
        alert('Data berhasil disimpan');
        document.location.href='galleries.php';
        </script>";
  } else {
    echo "<script>
        alert('Data gagal disimpan');
        document.location.href='galleries.php';
        </script>";
  }
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galleries</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="./assets/js/init-alpine.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script src="./assets/js/charts-lines.js" defer></script>
  <script src="./assets/js/charts-pie.js" defer></script>
  <script src="./assets/js/charts-bars.js" defer></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <?php require "sidebar.php"; ?>
    <div class="flex flex-col flex-1">
      <?php require "header.php"; ?>
      <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Galleries Video
          </h2>

          <!-- <p class="mb-8 text-gray-600 dark:text-gray-400">
            Pada halaman ini disediakan penganturan untuk multimedia seperti Gambar Gallery, Video dan Musik untuk undangan andangan anda.
          </p> -->

          <!-- Background awal -->
          <div class="grid gap-6 mb-8 md:grid-cols-12">
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">

                <form action="" method="POST" enctype="multipart/form-data">
                  <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>
                  <input type="text" name="videoLama" value="<?php echo $query['video']; ?>" hidden>

                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Galleries Video</span>
                    <input type="file" name="video" id="video" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  </label>

                  <div class="flex items-center text-sm">
                    <label class="block mt-6 mb-6 text-sm">
                      <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                    </label>

                    <label class="block ml-6 mt-6 mb-6 text-sm">
                      <a href="galleries.php" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Cancel</a>
                    </label>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
</body>

</html>