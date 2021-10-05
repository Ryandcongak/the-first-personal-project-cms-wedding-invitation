<?php
// Start Session
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "../function.php";

if (isset($_POST["submit"])) {
    if (testimoni($_POST) > 0) {
        echo "<script>
        alert('Terima kasih atas Testimoni anda.');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Maaf gagal.');
        document.location.href='index.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comments</title>
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
            <main class="h-full pb-16 overflow-y-auto text-center">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Love Wedding Invitation
                    </h2>
                    <p class="mb-8 text-gray-600 dark:text-gray-400">Kami ucapkan terima kasih <br>karena telah mempercayakan Undangan Online Anda di <br>Love Wedding Invitation. <br>Berikan testimoni anda ya.... </p>
                    <!-- Resepsi -->
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" name="name" id="name" hidden>
                            <div class="mb-3 dark:text-gray-400">
                                <label for="formFile" class="form-label dark:text-gray-400">Pilih foto terbaik kamu</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>
                            <label class="block mt-4 mb-6 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Testimoni</span>
                                <textarea name="testi" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" rows="3" placeholder="Ketikan testimoni..." required></textarea>
                            </label>
                            <div class="flex justify-center text-center">
                                <button type="submit" name="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                    <span>Send</span>
                                    <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>