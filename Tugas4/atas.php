<?php
include_once 'webmenu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAckS JAckS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: salmon;
            background-color: #f4f4f4; /* Tambahkan warna latar belakang di sini */
            padding: 10px 0; /* Berikan ruang di sekitar teks h1 */
        }
        .menu {
            background-color: salmon;
            padding: 10px 0;
            text-align: center;
        }
        .menu a {
            color: blue;
            text-decoration: none;
            margin: 0 10px;
        }
        .menu a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>JAckS JAckS</h1>

    <div class="menu">
        <!-- Home | Produk | Pesan | Galeri | Gesbuk -->
        <?php
            //looping foreach dari webmenu.php
            foreach ($menu_atas as $key => $value) {
                // echo "$key $value <br>";
                echo "<a href='index.php?hal=$key'>$value</a>  |  ";
            }
        ?>
    </div>
</body>
</html>
