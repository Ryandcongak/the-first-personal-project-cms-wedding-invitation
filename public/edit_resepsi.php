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
  if (editresepsi($_POST) > 0) {
    echo "<script>
        alert('Data berhasil di edit');
        document.location.href='resepsi.php';
        </script>";
  } else {
    echo "<script>
        alert('Data gagal di edit');
        document.location.href='resepsi.php';
        </script>";
  }
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resepsi</title>
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
            Resepsi
          </h2>

          <!-- Big section cards -->
          <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data - Data Resepsi
          </h4>
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <p class="text-sm text-gray-600 dark:text-gray-400">
              Large, full width sections goes here
            </p>
          </div>

          <!-- Form Resepsi -->
          <!-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Mempelai Pria
            </h4> -->
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="text" name="id" value="<?php echo $query['id']; ?>" hidden>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Hari</span>
                <select name="hari" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['hari']; ?></option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jum'at">Jum'at</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal</span>
                <select name="tanggal" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['tanggal']; ?></option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Bulan</span>
                <select name="bulan" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['bulan']; ?></option>
                  <?php
                  $bulan = array("January", "February", "March", "April", "May", "Juni", "July", "August", "September", "October", "November", "December");
                  $jlh_bln = count($bulan);
                  for ($c = 0; $c < $jlh_bln; $c += 1) {
                    echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                  }
                  ?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tahun</span>
                <select name="tahun" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['tahun']; ?></option>
                  <?php
                  $now = date('Y');
                  for ($tahun = $now; $tahun <= 2100; $tahun++) {
                    echo "<option value='$tahun'>$tahun</option>";
                  }
                  ?>
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jam</span>
                <input type="text" name="jam" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['jam']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Maps Link</span>
                <input type="text" name="maps_link" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['maps_link']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Maps Frame</span>
                <input type="text" name="maps_frame" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['maps_frame']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pengingat</span>
                <input type="text" name="pengingat" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['pengingat']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tempat</span>
                <input type="text" name="tempat" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $query['tempat']; ?>" />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pembuka</span>
                <select name="kalimat_pembuka" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['kalimat_pembuka']; ?></option>
                  <option value="Om Swastiastu">Om Swastiastu</option>
                  <option value="Assalamu\'aikum Warahmatullahi Wabarakatuh">Assalamu'aikum Warahmatullahi Wabarakatuh</option>
                  <option value="Namo Buddhaya">Namo Buddhaya</option>
                  <option value="">Tidak isi</option>
                </select>
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Deskripsi</span>
                <select name="kalimat" class=" form-select block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" aria-label="Default select example" width="20px">
                  <option selected><?php echo $query['kalimat']; ?></option>
                  <option value="Atas Asung Kertha Wara Nugraha Ida Sang Hyang Widhi Wasa / Tuhan yang Maha Esa, kami bermaksud mengundang Bapak/Ibu/Saudara/i pada upacara Manusa Yadnya (Pawiwahan) putra - putri kami, yang akan dilaksanakan pada:">Hindu</option>
                  <option value="Dengan memohon Ridho dan rahmat Allah SWT, kami bermaksud menyelenggarakan Syukuran Pernikahan putra putri kami yang insyaAllah aka diselenggarakan pada:">Islam</option>
                  <option value="Tuhan membuat segala sesuatu indah pada waktunya, indah saat Dia mempertemukan, indah saat Dia menumbuhkan kasih, dan indah saat dia mempersatukan putra-putri kami dalam sesuatu ikatan pernikahan kudus. Dengan segala kerendahan hati dan dengan ungkapan syukur atas karunia Tuhan, kami mengundang Bapak/ Ibu/ Saudara/ i untuk menghadiri Resepsi pernikahan putra-putri kami yang akan diselenggarakan pada :">Kristen</option>
                  <option value="Dengan rahmat Tuhan Yang Maha Esa dan Berkah Sang Triratna kami mengudang Bapak/Ibu/Saudara/i untuk menghadiri pernikahan putra-putri kami.">Budha</option>
                </select>
              </label>

              <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $query['bg_awal']; ?>" alt="" loading="lazy" hidden />
              <input type="file" name="bg_awal" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" hidden>
              <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $query['bg_header']; ?>" alt="" loading="lazy" hidden />
              <input type="file" name="bg_header" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" hidden>
              <img class="object-cover w-full h-full rounded-full" src="<?php echo "../client/images/" . $query['bg_footer']; ?>" alt="" loading="lazy" hidden />
              <input type="file" name="bg_footer" class="px-4 py-2 mt-2 mb-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" hidden>

              <div class="flex items-center text-sm">
                <label class="block mt-6 mb-6 text-sm">
                  <button type="submit" name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Simpan</button>
                </label>

                <label class="block ml-6 mt-6 mb-6 text-sm">
                  <a href="resepsi.php" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Cancel</a>
                </label>
              </div>

            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>