<?php
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['tingkat'] == "0";
    header('Location: login.php');
    exit;
}

require "../function.php";
// Pagination
$jumlahPerHalaman = 10;
$jumlahdata = count(query("SELECT * FROM users"));
// round = Mmebultkan bilangan decimal terdekatnya
// floor = Membulatkan bilangan decimal kebawah
// ceil = Membulatkan bilangan decimal ke atas
$jumlahHalaman = ceil($jumlahdata / $jumlahPerHalaman);
// Sort code for if else
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahPerHalaman * $halamanaktif) - $jumlahPerHalaman;
// LIMIT nomor $array ke berapa, $batas array 
$query_sql = query("SELECT * FROM users LIMIT $awalData,$jumlahPerHalaman");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
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
                        Customers Register
                    </h2>
                    <!-- With actions -->
                    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                        Table customers with actions
                    </h4>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Username</th>
                                        <th class="px-4 py-3">Pengirim Atas Nama</th>
                                        <th class="px-4 py-3">Bukti Transfer</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Category</th>
                                        <th class="px-4 py-3">Date</th>
                                        <th class="px-4 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    foreach ($query_sql as $cust) : ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <?php
                                                    $id_user = $_SESSION['users_id'];
                                                    $query_guests = query("SELECT * FROM profil_pria WHERE id_users = $id_user");
                                                    foreach ($query_guests as $guest) : ?>
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full" src="../client/images/<?php echo $guest['foto_profil']; ?>" alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <div>
                                                        <p class="font-semibold"><?php echo $cust['username']; ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $cust['atas_nama']; ?>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <a href="assets/img/Bank_Transfer/<?php echo $cust['ss_transfer']; ?>" target="_BLANK">
                                                        <div class="relative w-12 h-12 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full" src="assets/img/Bank_Transfer/<?php echo $cust['ss_transfer']; ?>" alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <?php
                                                $custs = $cust['aksi'];
                                                if ($custs == "1") {
                                                    echo "<span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Approve</span>";
                                                } else {
                                                    echo "<span
                                                        class='px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600'
                                                      >Pending</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="px-4 py-3 text-xs">

                                                <?php
                                                $custs = $cust['tingkat'];
                                                if ($custs == "1") {
                                                    echo "<span
                                                        class='px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600'
                                                      >Admin</span>";
                                                } else {
                                                    echo "<span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Client</span>";
                                                }
                                                ?>

                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php echo $cust['tanggal']; ?>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <a href="edit-users.php?id=<?php echo $cust['id']; ?>">
                                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray " aria-label="Edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                    <a href="delete-users.php?id=<?php echo $cust['id']; ?>">
                                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                </div>
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
                                                <a href="?halaman=<?= $halamanaktif - 1; ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue" aria-label="Previous">
                                                    <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                            <?php if ($i == $halamanaktif) : ?>
                                                <li>
                                                    <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                                        <?= $i; ?>
                                                    </a>
                                                </li>
                                            <?php else : ?>
                                                <li>
                                                    <a href="?halaman=<?= $i; ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue">
                                                        <?= $i; ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <?php if ($halamanaktif < $jumlahHalaman) : ?>
                                            <li>
                                                <a href="?halaman=<?= $halamanaktif + 1; ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-blue" aria-label="Next">
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