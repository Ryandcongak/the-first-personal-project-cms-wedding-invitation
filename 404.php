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
          <div class="container flex flex-col items-center px-6 mx-auto">
            <svg class="w-12 h-12 mt-8 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd"></path>
            </svg>
            <h1 class="text-6xl font-semibold text-gray-700 dark:text-gray-200">
              404
            </h1>
            <p class="text-gray-700 dark:text-gray-300">
              Page not found. Check the address or
              <a class="text-purple-600 hover:underline dark:text-purple-300" href="index.php">
                go back
              </a>
              .
            </p>
          </div>
        </main>
      </div>
    </div>
  </body>

  </html>