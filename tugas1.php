<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

<style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.profile {
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.profile p {
    margin: 10px 0;
}

h1 {
    text-align: center;
}
</style>

</head>
<body>
    <div class="container">
        <h1>My Profile</h1>
        <div class="profile">
            <?php
                $name = "Alfi Muhammad Dzikra";
                $_pekerjaan = "Mahasiswa";
                $uni = "Universitas Esa Unggul";
                $nim = "20210801237";
                $email = "zikraboyd123@gmail.com";
                $phone = "081528775717";
                $umur = "20";
            ?>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Pekerjaan:</strong> <?php echo $_pekerjaan; ?></p>
            <p><strong>Universitas:</strong> <?php echo $uni; ?></p>
            <p><strong>NIM:</strong> <?php echo $nim; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Umur:</strong> <?php echo $umur; ?></p>
        </div>
    </div>
</body>
</html>
