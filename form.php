<?php
$host = "localhost";
$port = 8111;
$database = "rentcar_db";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $pw);
$namaMobil = $kapasitas = $harga24 = $harga12 = $rating = $gambar = '';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "select * from mobil where idmobil = ?";
    $result = $connection->prepare($sql);
    $result->execute([$id]);
    foreach ($result as $mobil) {
        $namaMobil = $mobil["nama_mobil"];
        $harga24 = $mobil["harga_24"];
        $harga12 = $mobil["harga_12"];
        $rating = $mobil["rating"];
        $kapasitas = $mobil["kapasitas"];
        $gambar = $mobil["gambar"];
    }
}
$connection = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking | RentCarNation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-custom navbar-expand-lg" id="mainNav">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-3 navbar-logo"
                style="font-family:'Poppins',sans-serif; font-weight:800;">
                <span class="logo-main">RC</span><span class="logo-car">Nation</span>
            </a>
            <div class="d-flex gap-2 align-items-center"></div>
            <a href="index.php" class="btn btn-cta">Back</a>
        </div>
        </div>
    </nav>

    <div class="container-lg min-vh-100 booking-wrapper">
        <div class="booking-row">
            <div class="booking-car-card">
                <div>
                    <div class="d-flex justify-content-center mb-4">
                        <img class="img-fluid booking-car-img" src="<?= $gambar; ?>" alt="car img">
                    </div>
                    <h4 class="text-start mb-3 fw-bold"><?= $namaMobil; ?></h4>
                    <p class="text-start fw-bold mb-2 capacity-text">Kapasitas <?= $kapasitas; ?> orang</p>
                    <p class="text-start hrg text-muted mb-1">Rp. <?= number_format($harga24, 2, ".", ","); ?> / 24 jam</p>
                    <p class="text-start hrg text-muted mb-2">Rp. <?= number_format($harga12, 2, ".", ","); ?> / 12 jam</p>
                    <p class="text-start mb-3"><?php for ($i = 0; $i < $rating; $i++) {
                        echo '★';
                    } ?></p>
                </div>
                <a href="index.php#Products" class="w-100 btn btn-cta mt-2 py-2 fw-bold sbmt">Ganti Mobil</a>
            </div>
            <div class="booking-form-card">
                <form name="booking" method="POST" action="landing.php?id=<?= isset($id) ? $id : '' ?>">
                    <h1 class="mb-5 booking-form-header"><a href="index.php"
                            class="text-black text-decoration-none logo-main">RentCar<span
                                class="logo-car">Nation</span></a>
                    </h1>
                    <label class="form-label">Nama Lengkap</label>
                    <input class="w-100 form-control mb-2" name="name" type="text">
                    <label class="form-label">Alamat</label>
                    <input class="w-100 form-control mb-2" name="address" type="text">
                    <label class="form-label">No KTP / SIM</label>
                    <input class="w-100 form-control mb-2" name="ktp" type="text">
                    <label class="form-label">No Telepon</label>
                    <input class="w-100 form-control mb-2" name="call" type="text">
                    <label class="form-label">Durasi</label>
                    <select class="form-select mb-3" id="jam" name="jam" aria-label="Default select example">
                        <option selected></option>
                        <option value="12">12 Jam</option>
                        <option value="24">24 Jam</option>
                    </select>
                    <input class="w-100 btn btn-cta mb-4 py-2 fw-bold sbmt" name="submit" type="submit" value="Pesan Sekarang">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
