<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require "../function.php";
// Pagination
$jumlahPerHalaman = 5;
$jumlahdata = count(query("SELECT * FROM blogs"));
// round = Mmebultkan bilangan decimal terdekatnya
// floor = Membulatkan bilangan decimal kebawah
// ceil = Membulatkan bilangan decimal ke atas
$jumlahHalaman = ceil($jumlahdata / $jumlahPerHalaman);
// Sort code for if else
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahPerHalaman * $halamanaktif) - $jumlahPerHalaman;
// LIMIT nomor $array ke berapa, $batas array 
$query_sql = query("SELECT * FROM blogs LIMIT $awalData,$jumlahPerHalaman");

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
                        Blogs
                    </h2>
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            <a href="blog_post.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </a>
                        </button> Add Blog
                    </h4>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Action</th>
                                        <th class="px-4 py-3">Image</th>
                                        <th class="px-4 py-3">Date</th>
                                        <th class="px-4 py-3">Judul</th>
                                        <th class="px-4 py-3">Kategori</th>
                                        <th class="px-4 py-3">Content</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    foreach ($query_sql as $b) :
                                        $deskripsi = html_entity_decode($b['content']); ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <a href="delete_blog.php?id=<?php echo $b['id']; ?>">
                                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full" src="../assets/images/blog/<?php echo $b['img_content']; ?>" alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $b['date']; ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $b['judul']; ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $b['kategori']; ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $deskripsi; ?>
                                            </td>
                                        </tr>
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
                                                <a href="?halaman=<?= $halamanaktif - 1; ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                                    <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                            <?php if ($i == $halamanaktif) : ?>
                                                <li>
                                                    <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                        <?= $i; ?>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li>
                                                    <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                                        <?= $i; ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <?php if ($halamanaktif < $jumlahHalaman) : ?>
                                            <li>
                                                <a href="?halaman=<?= $halamanaktif + 1; ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
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