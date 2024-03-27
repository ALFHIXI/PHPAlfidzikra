<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
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
        <h2>Shopping Form</h2>
        <form action="" method="POST">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" required><br>

            <label for="produk">Produk:</label>
            <select name="produk" required>
                <option value="">Pilih Produk</option>
                <option value="RakSepatu">Rak Sepatu (Rp 250.000)</option>
                <option value="RakBuku">Rak Buku (Rp 500.000)</option>
                <option value="AC">AC (Rp 2.000.000)</option>
                <option value="TV">TV (Rp 3.000.000)</option>
                <option value="Kulkas">Kulkas (Rp 4.000.000)</option>
            </select><br>

            <label for="jumlah_beli">Jumlah Beli:</label>
            <input type="number" name="jumlah_beli" required><br>

            <input type="submit" name="submit" value="Hitung Total">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $produk = $_POST['produk'];
            $jumlah_beli = $_POST['jumlah_beli'];

            // Definisikan harga satuan berdasarkan produk yang dipilih
            switch ($produk) {
                case 'RakSepatu':
                    $harga_satuan = 250000;
                    break;
                case 'RakBuku':
                    $harga_satuan = 500000;
                    break;
                case 'AC':
                    $harga_satuan = 2000000;
                    break;
                case 'TV':
                    $harga_satuan = 3000000;
                    break;
                case 'Kulkas':
                    $harga_satuan = 4000000;
                    break;
                default:
                    $harga_satuan = 0;
            }

            $total_belanja = $jumlah_beli * $harga_satuan;

            $diskon = 0;
            if ($total_belanja >= 1000000) {
                $diskon = 0.1 * $total_belanja;
            } elseif ($total_belanja >= 5000000) {
                $diskon = 0.05 * $total_belanja;
            }

            $total_setelah_diskon = $total_belanja - $diskon;
            $ppn = 0.1 * $total_setelah_diskon;
            $harga_bersih = $total_setelah_diskon + $ppn;

            echo "<h3>Ringkasan Pembelian</h3>";
            echo "Nama Pelanggan: $nama_pelanggan<br>";
            echo "Produk: $produk<br>";
            echo "Jumlah Beli: $jumlah_beli<br>";
            echo "Harga Satuan: " . number_format($harga_satuan) . "<br>"; // Menampilkan harga satuan dengan format ribuan
            echo "Total Belanja: " . number_format($total_belanja) . "<br>"; // Menampilkan total belanja dengan format ribuan
            echo "Diskon: " . number_format($diskon) . "<br>"; // Menampilkan diskon dengan format ribuan
            echo "PPN (10%): " . number_format($ppn) . "<br>"; // Menampilkan PPN dengan format ribuan
            echo "Harga Bersih: " . number_format($harga_bersih); // Menampilkan harga bersih dengan format ribuan
        }
        ?>
    </div>
</body>
</html>
