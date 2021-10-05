<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require "../function.php";
$id = $_GET['id'];
$query = query("SELECT * FROM contoh WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit_contoh($_POST) > 0) {
        echo "<script>
        alert('Data berhasil di edit');
        document.location.href='contoh_undangan.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di edit');
        document.location.href='contoh_undangan.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://cdn.tiny.cloud/1/wt0njrqvcyac1g9b4igb3zqx5wrxrc52xac5ex5mc5q2ziku/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
        <!-- Sidebar Admin -->
        <?php require "sidebar-admin.php"; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require "header-admin.php"; ?>
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        VIEW EDIT URL
                    </h2>
                    <!-- With actions -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <form action="" method="POST">
                                <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">URL View</span>
                                    <input type="text" name="url" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['url']; ?>" />
                                </label>
                                <label class="block mt-6 mb-6 mr-6 text-sm">
                                    <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z" />
                                        </svg></button>
                                    <a href="contoh_undangan.php" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" role="button">Cancel</a>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>

</body>

</html>