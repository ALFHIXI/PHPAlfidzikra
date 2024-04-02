<?php
// session_start(); // Anda tidak perlu memulai sesi lagi di sini karena sesi sudah dimulai di Mahasiswa.php

// Memuat kelas Mahasiswa
require_once 'Mahasiswa.php';

// Memproses form dan menambahkan data mahasiswa ke dalam session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kuliah = $_POST['kuliah'];
        $nilai = $_POST['nilai'];
        $universitas = $_POST['universitas']; // Dapatkan universitas dari formulir

        $mahasiswa = new Mahasiswa($nim, $nama, $kuliah, $nilai, $universitas);

        // Menyimpan data mahasiswa ke dalam array session
        if (!isset($_SESSION['mahasiswa'])) {
            $_SESSION['mahasiswa'] = array();
        }
        $_SESSION['mahasiswa'][] = $mahasiswa;
    } elseif(isset($_POST['hapus'])) {
        $hapusIndex = $_POST['hapus'];

        // Hapus data mahasiswa dari session
        if(isset($_SESSION['mahasiswa'][$hapusIndex])) {
            unset($_SESSION['mahasiswa'][$hapusIndex]);
            $_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']); // Reset kembali indeks array
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Form Mahasiswa</h2>
    <form method="post" action="">
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        Universitas:
        <select name="universitas">
            <option value="Universitas Indonesia">Universitas Indonesia</option>
            <option value="Institut Teknologi Bandung">Institut Teknologi Bandung</option>
            <option value="Universitas Gadjah Mada">Universitas Gadjah Mada</option>
            <option value="Institut Pertanian Bogor">Institut Pertanian Bogor</option>
            <option value="Universitas Esa Unggul">Universitas Esa Unggul</option>
            <!-- Tambahkan universitas lainnya di sini sesuai kebutuhan -->
        </select><br>
        Mata Kuliah:
        <select name="kuliah">
            <option value="HTML">HTML</option>
            <option value="PHP">PHP</option>
            <option value="JavaScript">JavaScript</option>
            <option value="UI/UX">UI/UX</option>
            <option value="Laravel">Laravel</option>
        </select><br>
        Nilai: <input type="number" name="nilai"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Informasi Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Universitas</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Grade</th>
            <th>Predikat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (isset($_SESSION['mahasiswa'])) {
            foreach ($_SESSION['mahasiswa'] as $index => $mahasiswa) {
                echo '<tr>';
                echo '<td>' . $mahasiswa->nim . '</td>';
                echo '<td>' . $mahasiswa->nama . '</td>';
                echo '<td>' . $mahasiswa->universitas . '</td>';
                echo '<td>' . $mahasiswa->kuliah . '</td>';
                echo '<td>' . $mahasiswa->nilai . '</td>';
                echo '<td>' . $mahasiswa->grade . '</td>';
                echo '<td>' . $mahasiswa->predikat . '</td>';
                echo '<td>' . $mahasiswa->status . '</td>';
                echo '<td><form method="post" action=""><button type="submit" name="hapus" value="' . $index . '">Hapus</button></form></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>

    <br>
    <form method="post" action="reset.php">
        <input type="submit" value="Hapus Semua Data">
    </form>

</body>
</html>
