<?php
// Inisialisasi variabel untuk menyimpan pesan produk dan total harga
$pesan_produk = "";
$total_harga = 0;

// Daftar jaket beserta harga satuan
$daftar_jaket = array(
    "Jaket Kulit" => 1000000, 
    "Celana Kulit" => 1500000, 
    "Sepatu Kulit" => 1100000, 
    "Sarung Tangan" => 800000, 
    "Ikat Pinggang" => 500000,
    "Tas" => 4000000
);

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang di-submit dari form
    $nama_jaket = $_POST["nama_jaket"];
    $jumlah = $_POST["jumlah"];
    $alamat_pengiriman = $_POST["alamat_pengiriman"];
    
    // Hitung total harga berdasarkan pilihan jaket dan jumlah yang dimasukkan oleh pengguna
    $total_harga = $daftar_jaket[$nama_jaket] * $jumlah;
    
    // Proses pesanan produk
    // Di sini Anda dapat menambahkan logika untuk menyimpan pesanan ke dalam database atau melakukan tindakan lainnya
    
    // Set pesan sukses
    $pesan_produk = "Pesanan Anda untuk $jumlah $nama_jaket telah diterima. Akan segera dikirim ke alamat $alamat_pengiriman. Total harga: Rp " . number_format($total_harga, 0, ',', '.') . ".";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Jaket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesan item</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama_jaket">Pilih Item:</label>
            <select id="nama_jaket" name="nama_jaket" required>
                <option value="">Pilih Item</option>
                <?php
                // Loop melalui daftar jaket dan menambahkan pilihan untuk setiap jaket
                foreach ($daftar_jaket as $jaket => $harga) {
                    echo "<option value='$jaket'>$jaket (Rp " . number_format($harga, 0, ',', '.') . ")</option>";
                }
                ?>
            </select>
            
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" required>
            
            <label for="alamat_pengiriman">Alamat Pengiriman:</label>
            <textarea id="alamat_pengiriman" name="alamat_pengiriman" required></textarea>
            
            <input type="submit" value="Pesan">
        </form>
        <?php if (!empty($pesan_produk)) : ?>
        <p><?php echo $pesan_produk; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
