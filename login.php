<?php
session_start();

$host = "localhost";
$port = 8111;
$database = "rentcar_db";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4", $user, $pw);
if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$username = isset($_COOKIE["username"]) ? (string) $_COOKIE["username"] : "";
$password = isset($_COOKIE["password"]) ? (string) $_COOKIE["password"] : "";
$error = "";
if (isset($_POST["login"])) {
    $username = (string) ($_POST["username"] ?? "");
    $password = (string) ($_POST["password"] ?? "");
    $sql = "SELECT * FROM akun WHERE nama = ? AND password = ?";
    $result = $connection->prepare($sql);
    $result->execute([$username, $password]);
    $success = false;
    $findUser = null;
    $findPass = null;
    foreach ($result as $akun) {
        $success = true;
        $findUser = $akun["nama"];
        $findPass = $akun["password"];
    }
    if ($success) {
        $_SESSION["username"] = $findUser;
        $_SESSION["login_success"] = true;
        if (isset($_POST["remember"])) {
            setcookie("username", $findUser, time() + 60 * 60 * 7, "/");
            setcookie("password", $findPass, time() + 60 * 60 * 7, "/");
        } else {
            setcookie("username", "", time() - 1, "/");
            setcookie("password", "", time() - 1, "/");
        }
        header("Location: index.php");
        exit;
    } else {
        $error = "Nama atau password salah.";
    }
}
$connection = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RentCarNation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loginsignup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="login-page">
    <nav class="navbar navbar-custom navbar-expand-lg" id="mainNav">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-3 navbar-logo"
                style="font-family:'Poppins',sans-serif; font-weight:800;">
                <span class="logo-main">RC</span><span class="logo-car">Nation</span>
            </a>
            <div class="d-flex gap-2 align-items-center"></div>
            <a href="index.php" class="btn btn-cta">Back</a>
        </div>
    </nav>

    <main class="login-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 login-card">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="text-center mb-4">Login</h2>

                            <?php if ($error !== ""): ?>
                                <div class="alert alert-danger py-2" role="alert">
                                    <?= htmlspecialchars($error) ?>
                                </div>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama</label>
                                    <input class="form-control" id="username" name="username" type="text"
                                        value="<?= htmlspecialchars($username) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" id="password" name="password" type="password"
                                        value="<?= htmlspecialchars($password) ?>">
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        <?= isset($_COOKIE["username"]) ? "checked" : "" ?>>
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>

                                <button class="w-100 btn btn-cta py-2 fw-bold" type="submit" name="login">Masuk</button>
                            </form>

                            <p class="text-center mt-4 mb-0 auth-footer">
                                Belum punya akun?
                                <a href="signup.php">Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
