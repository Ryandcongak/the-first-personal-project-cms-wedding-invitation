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
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Guests Comments
                    </h2>
                    <p class="mb-8 text-gray-600 dark:text-gray-400">Lihat ucapan - ucapan tamu undangan anda.</p>
                    <!-- Resepsi -->
                    <?php
                    $x = query("SELECT * FROM `comments` JOIN `users` ON comments.id_users=users.id WHERE comments.id_users='$id_author'"); ?>
                    <?php foreach ($x as $c) :
                    ?>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                            <div class="alert alert-success text-gray-700 dark:text-gray-200" role="alert">
                                <h4 class="alert-heading"><?php echo $c['come_or_not']; ?></h4>
                                <p><?php echo $c['comment']; ?></p>
                                <hr>
                                <p class="mb-0"><?php echo $c['name_comment']; ?></p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </main>
        </div>
    </div>
</body>

</html>