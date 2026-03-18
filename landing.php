<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['name'] ?? '-';
    $alamat = $_POST['address'] ?? '-';
    $ktp = $_POST['ktp'] ?? '-';
    $telepon = $_POST['call'] ?? '-';
    $durasi = $_POST['jam'] ?? '-';
    $mobil = $_GET['id'] ?? '-';
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil | RentCarNation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-custom navbar-expand-lg" id="mainNav">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-3 navbar-logo"
                style="font-family:'Poppins',sans-serif; font-weight:800;">
                <span class="logo-main">RC</span><span class="logo-car">Nation</span>
            </a>
            <div class="d-flex gap-2 align-items-center"></div>
        </div>
    </nav>
    <script src="javascript/index.js"></script>
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-check-circle-fill text-primary" style="font-size: 4rem;"></i>
                            <h1 class="h2 mt-3 fw-bold">Pemesanan Berhasil</h1>
                            <p class="text-muted mb-0">Data penyewaan kamu sudah masuk.</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" style="width: 35%;">Nama Lengkap</th>
                                        <td><?= htmlspecialchars($nama) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alamat</th>
                                        <td><?= htmlspecialchars($alamat) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">No KTP / SIM</th>
                                        <td><?= htmlspecialchars($ktp) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">No Telepon</th>
                                        <td><?= htmlspecialchars($telepon) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Durasi</th>
                                        <td><?= htmlspecialchars($durasi) ?> Jam</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">ID Mobil</th>
                                        <td><?= htmlspecialchars($mobil) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-4">
                            <a href="index.php" class="btn btn-primary">Kembali ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
