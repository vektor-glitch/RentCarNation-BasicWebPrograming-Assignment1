<?php
session_start();
if (isset($_SESSION['login_success'])) {
    echo "<script>logingacor = true;</script>";
    unset($_SESSION['login_success']);
}
if (isset($_SESSION['login_error'])) {
    $msg = addslashes($_SESSION['login_error']);
    echo "<script>window.loginErrorMsg = '$msg';</script>";
    unset($_SESSION['login_error']);
}

$host = "localhost";
$port = 8111;
$database = "rentcar_db";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $pw);
$sql = "select * from mobil";
$result = $connection->prepare($sql);
$result->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">

    <title>RentCarNation</title>
</head>

<body>
    <nav class="navbar navbar-custom navbar-expand-lg" id="mainNav">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-3 text-white fw-bold">RC<span class="logo-car">Nation</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav mx-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <div class="d-flex gap-2 align-items-center">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo '
                            <div class="dropdown">
                                <button class="btn btn-cta dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    ' . htmlspecialchars($username) . '
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        ';
                    } else {
                        echo '<a href="login.php" class="btn btn-cta">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="home" id="home">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/car1.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-overlay">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Sewa mobil jadi lebih mudah</h5>
                            <p>Pilih mobil untuk kebutuhan harian, liburan, atau perjalanan kerja.</p>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a href="#Products" class="btn btn-cta btn-sm">Lihat Mobil</a>';
                            } else {
                                echo '<a href="login.php" class="btn btn-cta btn-sm">Login Dulu</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/car2.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-overlay">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Pilihan mobil cukup lengkap</h5>
                            <p>Ada mobil keluarga sampai SUV yang siap dipakai untuk perjalananmu.</p>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a href="#Products" class="btn btn-cta btn-sm">Lihat Mobil</a>';
                            } else {
                                echo '<a href="login.php" class="btn btn-cta btn-sm">Login Dulu</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/car3.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-overlay">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Harga jelas, proses simpel</h5>
                            <p>Tersedia paket 12 jam dan 24 jam dengan proses booking yang singkat.</p>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a href="#Products" class="btn btn-cta btn-sm">Lihat Mobil</a>';
                            } else {
                                echo '<a href="login.php" class="btn btn-cta btn-sm">Login Dulu</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <section class="product pt-1 pb-2 bg-light" id="Products">
        <div class="container-lg pt-0 pb-2">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2 class="fw-bold mb-5"><br>DAFTAR MOBIL</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($result as $mobil) {
                    $idMobil = $mobil["idmobil"];
                    $namaMobil = $mobil["nama_mobil"];
                    $harga12 = $mobil["harga_12"];
                    $harga24 = $mobil["harga_24"];
                    $rating = $mobil["rating"];
                    $kapasitas = $mobil["kapasitas"];
                    $gambar = $mobil["gambar"];

                    echo '<div class="col-md-4 col-sm-12 text-center">
                        <div class="product-list py-5 px-3 bg-white mb-3 shadow-sm rounded px-3 bg-white">
                            <img class="w-75" src="' . $gambar . '" alt="car">
                            <h6 class="text-start">';
                    echo $namaMobil;
                    echo '</h6>
                            <p class="text-start capacity-text fw-bold">Kapasitas: ';
                    echo $kapasitas;
                    echo ' orang</p>
                            <p class="text-start hrg">Rp. ';
                    echo number_format($harga12, 2, ".", ",");
                    echo ' / 12 jam</p>
                            <p class="text-start hrg">Rp. ';
                    echo number_format($harga24, 2, ".", ",");
                    echo ' / 24 jam</p>
                            <p class="text-start">';
                    for ($i = 0; $i < $rating; $i++) {
                        echo '★';
                    }
                    echo '</p>';
                    if (isset($_SESSION['username'])) {
                        echo '<a href="form.php?id=';
                        echo $idMobil;
                        echo '" class="btn btn-primary fw-bold">Sewa</a>';
                    } else {
                        echo '<a href="login.php" class="btn btn-primary fw-bold">Sewa</a>';
                    }
                    echo '</div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="service pt-2 pb-3" id="Services">
        <div class="container-lg pt-2 pb-2">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2 class="fw-bold mb-5">LAYANAN</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-car text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Mobil Bersih</h3>
                        <p class="text-muted">Mobil dibersihkan dulu sebelum dipakai pelanggan berikutnya.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-cogs text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Perawatan Rutin</h3>
                        <p class="text-muted">Mobil dicek dan dirawat berkala supaya tetap nyaman dipakai.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-check text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Cek Sebelum Jalan</h3>
                        <p class="text-muted">Kondisi mobil dicek dulu sebelum diserahkan ke penyewa.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-user text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Driver</h3>
                        <p class="text-muted">Tersedia driver untuk yang ingin perjalanan lebih santai.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-phone text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Proses Cepat</h3>
                        <p class="text-muted">Pemesanan bisa dilakukan langsung lewat web tanpa langkah yang ribet.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="service-list mb-5 text-center py-5 px-3 shadow-sm bg-white">
                        <i class="fas fa-star text-warning fs-3 mb-4"></i>
                        <h3 class="fs-6 fw-bold">Pelayanan Oke</h3>
                        <p class="text-muted">Kami usahakan pengalaman sewa tetap nyaman dari awal sampai selesai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials pt-3 pb-5 bg-light" id="testimonials">
        <div class="container-lg pt-1 pb-2">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <h2 class="fw-bold mb-4">Testimoni</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000"
                        data-bs-pause="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <article class="testimonial-card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4 testimonial-media">
                                            <img src="images/anne.jpeg" alt="Anne Boleyn" class="testimonial-photo">
                                        </div>
                                        <div class="col-md-8 testimonial-content">
                                            <p class="testimonial-quote">"Pesan mobilnya gampang, unitnya juga bersih.
                                                Cocok dipakai buat jalan keluar kota."</p>
                                            <h3 class="testimonial-name">Anne Boleyn</h3>
                                            <p class="testimonial-role">Customer</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="carousel-item">
                                <article class="testimonial-card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4 testimonial-media">
                                            <img src="images/sal.jpeg" alt="Sal Priadi" class="testimonial-photo">
                                        </div>
                                        <div class="col-md-8 testimonial-content">
                                            <p class="testimonial-quote">"Harganya jelas, prosesnya cepat, dan mobil
                                                yang datang sesuai dengan pilihan di website."</p>
                                            <h3 class="testimonial-name">Sal Priadi</h3>
                                            <p class="testimonial-role">Customer</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="carousel-item">
                                <article class="testimonial-card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4 testimonial-media">
                                            <img src="images/emma.jpeg" alt="emma watson" class="testimonial-photo">
                                        </div>
                                        <div class="col-md-8 testimonial-content">
                                            <p class="testimonial-quote">"Sudah beberapa kali sewa di sini dan sejauh
                                                ini oke. Mobil nyaman dipakai dan adminnya responsif."</p>
                                            <h3 class="testimonial-name">Emma Watson</h3>
                                            <p class="testimonial-role">Customer</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <button class="carousel-control-prev testimonial-control" type="button"
                            data-bs-target="#testimonialCarousel" data-bs-slide="prev"
                            aria-label="Previous testimonial">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next testimonial-control" type="button"
                            data-bs-target="#testimonialCarousel" data-bs-slide="next" aria-label="Next testimonial">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>

                        <div class="carousel-indicators testimonial-indicators">
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="about">
        <div class="footer-main">
            <div class="container py-5">
                <div class="row g-5">

                    <div class="col-lg-4">
                        <a class="navbar-brand mb-3 d-inline-block" href="#home">RentCar<span
                                class="logo-car">Nation</span></a>
                        <p class="footer-desc">Rental mobil sederhana untuk kebutuhan harian, liburan, atau perjalanan
                            bareng keluarga.</p>
                        <div class="footer-socials d-flex gap-3 mt-3">
                            <a href="https://www.instagram.com/vctrswrld" target="_blank" class="footer-social-link"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://github.com/vektor-glitch" target="_blank" class="footer-social-link"><i
                                    class="bi bi-github"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <h6 class="footer-heading footer-hover-title">Menu</h6>
                        <ul class="list-unstyled footer-links footer-nav-links">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#Products">Products</a></li>
                            <li><a href="#Services">Services</a></li>
                            <li><a href="#testimonials">Testimonials</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6">
                        <h6 class="footer-heading footer-hover-title">Paket</h6>
                        <ul class="list-unstyled footer-links footer-nav-links">
                            <li><a href="#Products">12-Hour Rental</a></li>
                            <li><a href="#Products">24-Hour Rental</a></li>
                            <li><a href="#Services">Professional Driver</a></li>
                            <li><a href="#Services">Fast Online Booking</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <h6 class="footer-heading">Kontak</h6>
                        <ul class="list-unstyled footer-links">
                            <li><i class="bi bi-geo-alt-fill me-2"></i>Jl. Permata Hijau, Bantul, Yogyakarta</li>
                            <li><i class="bi bi-envelope-fill me-2"></i>support@rentcarnation.id</li>
                            <li><i class="bi bi-telephone-fill me-2"></i>+628987153305</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container d-flex flex-wrap justify-content-between align-items-center py-3">
                <p class="mb-0 footer-copy">&copy; 2026 RentCarNation</p>
                <div class="d-flex gap-4">
                    <a href="#" class="footer-bottom-link">Privasi</a>
                    <a href="#" class="footer-bottom-link">Syarat</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="javascript/index.js"></script>

</html>
