<?php
session_start();
$host = "localhost";
$port = 8111;
$database = "rentcar_db";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4", $user, $pw, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Sign Up</title>
</head>

<body>
    gabisa buat sign up bang maap. <a href="login.php">klik sini buat balik</a>
    <br>
    username: vektor
    <br>
    password: vektor123
</body>

</html>