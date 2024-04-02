<?php
require_once 'Mahasiswa.php';

// Inisialisasi objek Mahasiswa
$ns1 = null;

// Tangkap data dari form jika ada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = isset($_POST['nim']) ? $_POST['nim'] : null;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
    $universitas = isset($_POST['universitas']) ? $_POST['universitas'] : null;
    $matkul = isset($_POST['kuliah']) ? $_POST['kuliah'] : null; // Ubah menjadi 'kuliah'
    $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : null; // Menambahkan nilai
    
    // Buat objek Mahasiswa jika data lengkap
    if ($nim && $nama && $universitas && $matkul && $nilai) {
        $ns1 = new Mahasiswa($nim, $nama, $universitas, $matkul, $nilai);
    }
}

// Reset data ketika tombol reset ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset'])) {
    $ns1 = null;
}
?>

<html>
<head>
    <title>Form Nilai Ujian Mahasiswa</title>
    <!-- CSS Styles -->
    <style>
        /* Font family */
        body {
            font-family: Arial, sans-serif;
        }

        /* Header style */
        h2 {
            color: #333;
        }

        /* Form style */
        form {
            margin-bottom: 20px;
        }

        /* Table style */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Alternate row background color */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover effect on rows */
        tr:hover {
            background-color: #ddd;
        }

        /* Text input style */
        input[type=text], input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Submit button style */
        input[type=submit], button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        /* Hover effect on submit button */
        input[type=submit]:hover, button:hover {
            background-color: #45a049;
        }

        /* Style for select dropdown */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 12px);
            background-position-y: center;
            padding-right: 30px;
        }
    </style>
</head>
<body>
    <h2>Form Nilai Ujian Mahasiswa</h2>
    <!-- Form input data mahasiswa -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
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

    <!-- Output tabel -->
    <?php
    if (isset($ns1)) {
        echo "<h2>Daftar Nilai Ujian Mahasiswa</h2>";
        echo "<table>";
        echo "<tr><th>NIM</th><th>Nama</th><th>Universitas</th><th>Mata Kuliah</th><th>Nilai</th><th>Status</th><th>Grade</th><th>Predikat</th></tr>";
        echo "<tr>";
        echo '<td>'. $ns1->nim .'</td>';
        echo '<td>'. $ns1->nama .'</td>';
        echo '<td>'. $ns1->universitas .'</td>';
        echo '<td>'. $ns1->matkul .'</td>';
        echo '<td>'. $ns1->nilai .'</td>'; // Menampilkan nilai
        echo '<td>'. $ns1->getStatus() .'</td>'; // Menampilkan status
        echo '<td>'. $ns1->getGrade() .'</td>'; // Menampilkan grade
        echo '<td>'. $ns1->getPredikat() .'</td>'; // Menampilkan predikat
        echo "</tr>";
        echo "</table>";
    }
    ?>

    <!-- Form reset -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
