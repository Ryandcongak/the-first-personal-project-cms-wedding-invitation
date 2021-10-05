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
  if (edit_music($_POST) > 0) {
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
  <title>Gallery</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="./assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <?php require "sidebar.php"; ?>
    <div class="flex flex-col flex-1">
      <?php require "header.php"; ?>
      <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Backsound Music
          </h2>
          <div class="alert alert-success text-gray-700 dark:text-gray-200" role="alert">
            <h4 class="alert-heading text-gray-700 dark:text-gray-200">Catatan!</h4>
            <p>* Klik telusuri</p>
            <p>* Kemudian pilih file</p>
            <p>* Pastikan yang anda pilih untuk upload adalah file mp3.</p>
            <p>* Kemudian klik Save</p>
            <p>* Atau klik cancel untuk membatalkan</p>
          </div>

          <!-- Background awal -->
          <div class="grid gap-6 mb-8 md:grid-cols-12">
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">

                <form action="" method="POST" enctype="multipart/form-data">
                  <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>
                  <input type="text" name="musicLama" value="<?php echo $query['music']; ?>" hidden>

                  <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Music</span>
                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo "../client/music/" . $query['music']; ?>" disabled />
                  </label>

                  <label class="block mt-4 text-sm">
                    <input type="file" name="music" id="music" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                  </label>

                  <div class="flex items-center text-sm">
                    <label class="block mt-6 mb-6 text-sm">
                      <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                          <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                        </svg></button>
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