<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../function.php";
$id = $_GET['id'];
$query = query("SELECT * FROM resepsi WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  if (editbg_footer($_POST) > 0) {
    echo "<script>
        alert('Data berhasil di edit');
        document.location.href='galleries.php';
        </script>";
  } else {
    echo "<script>
        alert('Data gagal di edit');
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
            Edit Backgound Footer
          </h2>

          <!-- Background awal -->
          <div class="grid gap-6 mb-8 md:grid-cols-12">
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">

                <form action="" method="POST" enctype="multipart/form-data">
                  <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>
                  <input type="text" name="bg_footerLama" value="<?php echo $query['bg_footer']; ?>" hidden>

                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Foto Profil</span>
                    <div class="relative hidden w-12 h-12 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $query['bg_footer']; ?>" alt="" loading="lazy" />
                    </div>
                  </label>

                  <label class="block mt-4 text-sm">
                    <input type="file" name="bg_footer" id="bg_footer" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                  </label>

                  <div class="flex items-center text-sm">
                    <label class="block mt-6 mb-6 text-sm">
                      <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Save</button>
                    </label>

                    <label class="block ml-6 mt-6 mb-6 text-sm">
                      <a href="galleries.php" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Cancel</a>
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