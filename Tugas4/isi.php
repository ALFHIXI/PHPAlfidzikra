<div style="height:300px">
    <?php
    // Memeriksa apakah parameter 'hal' telah diset
    if(isset($_GET['hal'])) {
        // Mengambil nilai 'hal' dari parameter GET
        $hal = $_GET['hal'];

        // Memuat halaman yang sesuai berdasarkan nilai 'hal'
        if(isset($menu_bawah[$hal])) {
            include_once $menu_bawah[$hal];
        } else {
            // Jika nilai 'hal' tidak ditemukan dalam daftar menu bawah, muat halaman home.php
            include_once "home.php";
        }
    } else {
        // Jika parameter 'hal' tidak ada, muat halaman home.php
        include_once "home.php";
    }
    ?>
</div>
