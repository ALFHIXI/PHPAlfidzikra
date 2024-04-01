<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses pengiriman formulir di sini

    // Setelah formulir dikirim, alihkan pengguna kembali ke halaman home
    header("Location: home.php");
    exit; // Penting untuk menghentikan eksekusi skrip lebih lanjut setelah menggunakan header()
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Guestbook</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
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
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    textarea {
        height: 100px;
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
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
    <h2>Guestbook</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">No. Telp:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="message">Pesan:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
