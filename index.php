<?php
require_once "assets/script/dbkoneksi.php";
// Mengambil Semua data dari tabel produk
$sql = "SELECT * FROM produk";
$produk = mysqli_query($koneksi, $sql);

// Mengambil Semua data dari tabel kategori_produk dengan id tertentu
$sql1 = "SELECT * FROM kategori_produk WHERE id = 1";
$kategori1 = mysqli_query($koneksi, $sql1);
$sql1 = "SELECT * FROM kategori_produk WHERE id = 2";
$kategori2 = mysqli_query($koneksi, $sql1);
$sql1 = "SELECT * FROM kategori_produk WHERE id = 3";
$kategori3 = mysqli_query($koneksi, $sql1);
$sql1 = "SELECT * FROM kategori_produk WHERE id = 4";
$kategori4 = mysqli_query($koneksi, $sql1);
$sql1 = "SELECT * FROM kategori_produk WHERE id = 5";
$kategori5 = mysqli_query($koneksi, $sql1);


// Mengambil data dari tabel produk dengan kategori tertentu
$sql2 = "SELECT * FROM produk WHERE kategori_produk_id = 1";
$produk1 = mysqli_query($koneksi, $sql2);
$sql3 = "SELECT * FROM produk WHERE kategori_produk_id = 2";
$produk2 = mysqli_query($koneksi, $sql3);
$sql4 = "SELECT * FROM produk WHERE kategori_produk_id = 3";
$produk3 = mysqli_query($koneksi, $sql4);
$sql5 = "SELECT * FROM produk WHERE kategori_produk_id = 4";
$produk4 = mysqli_query($koneksi, $sql5);
$sql6 = "SELECT * FROM produk WHERE kategori_produk_id = 5";
$produk5 = mysqli_query($koneksi, $sql6);

// Mengambil 5 data dari tabel produk dengan acak
$sql7 = "SELECT * FROM produk ORDER BY RAND() LIMIT 5";
$produk6 = mysqli_query($koneksi, $sql7);

?>


<!-- Halaman Etalase Produk -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LacoMart</title>
    <link rel="shortcut icon" href="assets/images/icon2.svg" type="image/x-icon" sizes="42x42">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/fron.css">

</head>

<body id="home">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-body-tertiar bg-secondary">
        <div class="container px-4 px-lg-2">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/icon.svg" alt="logo" class="bg-light ps-2 py-2 rounded-3 logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item" style="font-size:13.7pt ;">
                        <a class="nav-link active" aria-current="page" href="#home" id="Button1">Home</a>
                    </li>
                    <li class="nav-item" style="font-size:13.7pt ;">
                        <a class="nav-link" href="#about" id="Button2">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <form role="search">
                        <div class="input-group">
                            <button class="btn btn-light rounded-start-5 keren" type="submit" style="height: 6.3vh;">
                                <i class="bi bi-search"></i>
                            </button>
                            <input class=" form-control custom-input rounded-end-5 me-2 asc" type="search" placeholder="Search..." aria-label="Search">
                        </div>
                    </form>
                </ul>
                <?php
                $sql8 = "SELECT COUNT(*) AS jumlah FROM pesanan";
                $query8 = mysqli_query($koneksi, $sql8);
                $pesanan = mysqli_fetch_assoc($query8);
                ?>
                <form class="d-flex ">
                    <a href="page/front/cart.php" class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Keranjang
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $pesanan['jumlah'] ?></span>
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header>
        <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/banner1.png" class="d-block w-100" alt="item1.png" style="min-height: 27vh;">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner2.png" class="d-block w-100" alt="item2.png" style="min-height: 27vh;">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner3.png" class="d-block w-100" alt="item3.png" style="min-height: 27vh;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container-fluid text-center">
            <div class="card px-4 shadow p-3 mb-5 selimut-kategori mx-4">
                <div class="row">
                    <?php
                    // katagori 1
                    $row = mysqli_fetch_assoc($kategori1);
                    ?>
                    <div class="col py-3">
                        <div class="row">
                            <img src="assets/images/kat1.png" alt="" class="kate">
                        </div>
                        <button onclick="cantik()" class="btn btn-warning kate"><?= $row['nama'] ?></button>
                    </div>
                    <?php
                    // katagori 2
                    $row = mysqli_fetch_assoc($kategori2);
                    ?>
                    <div class="col py-3">
                        <div class="row">
                            <img src="assets/images/kat2.png" alt="" class="kate">
                        </div>
                        <button onclick="elek()" class="btn btn-primary kate"><?= $row['nama'] ?></button>
                    </div>
                    <?php
                    // katagori 3
                    $row = mysqli_fetch_assoc($kategori3);
                    ?>
                    <div class="col py-3">
                        <div class="row">
                            <img src="assets/images/kat3.png" alt="" class="kate">
                        </div>
                        <button onclick="fspria()" class="btn btn-danger kate"><?= $row['nama'] ?></button>
                    </div>
                    <?php
                    // katagori 4
                    $row = mysqli_fetch_assoc($kategori4);
                    ?>
                    <div class="col py-3">
                        <div class="row">
                            <img src="assets/images/kat4.png" alt="" class="kate">
                        </div>
                        <button onclick="olah()" class="btn btn-dark kate"><?= $row['nama'] ?></button>
                    </div>
                    <?php
                    // katagori 5
                    $row = mysqli_fetch_assoc($kategori5);
                    ?>
                    <div class="col py-3">
                        <div class="row">
                            <img src="assets/images/kat5.png" alt="" class="kate">
                        </div>
                        <button onclick="hp()" class="btn btn-info kate"><?= $row['nama'] ?></button>
                    </div>
                </div>
            </div>
    </header>

    <!-- Section-->
    <section>
        <div class="container px-lg-3 mt-4">
            <div class="row gx-lg-5">
                <h5 class="text-start text-uppercase pb-2">Produk Rekomendasi</h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5 mb-3">
                <?php
                while ($row = mysqli_fetch_assoc($produk6)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row gx-lg-5 ">
                <h5 class="text-start pb-2">Kecantikan</h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5 mb-3">
                <?php
                while ($row = mysqli_fetch_assoc($produk1)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>" id="elek">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row gx-lg-5">
                <h5 class="text-start pb-2">Elektronik</h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5 mb-3">
                <?php
                while ($row = mysqli_fetch_assoc($produk2)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>" id="fspria">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row gx-lg-5">
                <h5 class="text-start pb-2">Fashion Pria</h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5 mb-3">
                <?php
                while ($row = mysqli_fetch_assoc($produk3)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>" id="olah">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row gx-lg-5">
                <h5 class="text-start pb-2">Olahraga </h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5 mb-3">
                <?php
                while ($row = mysqli_fetch_assoc($produk4)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>" id="hp">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="row gx-lg-5">
                <h5 class="text-start pb-2">
                    Handphone & Akseoris
                </h5>
            </div>
            <div class="row gx-lg-5 row-cols-xl-5">
                <?php
                while ($row = mysqli_fetch_assoc($produk5)) {

                ?>
                    <div class="col mb-5">
                        <div class="card text-center shadow p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="assets/images/<?= $row['img'] ?>" alt="gambar" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="fw-bolder"><?= $row['nama'] ?></p>
                                    <!-- Product price-->
                                    <?php
                                    // format harga jual
                                    $harga_jual = $row['harga_jual'];
                                    $rupiah = "Rp " . number_format($harga_jual, 0, ',', '.');
                                    ?>
                                    <span><?= $rupiah ?></span>
                                </div>
                                <br>
                                <a class="btn btn-outline-dark mt-auto" href="page/front/detail.php?id=<?= $row['id'] ?>">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    </section>
    <!-- Footer-->

    <footer id="about">
        <div class="container-fluid bg-dark text-light py-5">
            <div class="container py-4">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <img src="assets/images/icon.svg" alt="icon" width="165" class="mb-3 ps-3 py-2 bg-light rounded rounded-4">
                        <p>
                            LacoMart adalah sebuah toko online yang menyediakan berbagai macam kebutuhan anda dengan harga yang terjangkau. Yasui, Lembo Ade & Umpaina.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5>Kontak Kami</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <p>
                                <i class="bi bi-geo-alt-fill" style="color: #1D9FE4;"></i>
                                &nbsp;Jl. Boulevard II, Kelapa Dua, Tangerang
                            </p>
                            <p>
                                <i class="bi bi-envelope-fill" style="color: #1D9FE4;"></i>
                                &nbsp;halo@lacomart.com
                            </p>
                            <p>
                                <i class="bi bi-telephone-fill" style="color: #1D9FE4;"></i>
                                &nbsp;+62 853 1111 1010
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5>Kritik & Saran</h5>
                        <form action="page/back/index.php">
                            <div class="input-group">
                                <input type="text" class="form-control p-2" placeholder="Silahkan Ketikan...">
                                <button class="btn btn-secondary">Kirim</button>
                            </div>
                        </form>
                        <h5 class="mt-4">Ikuti Kami</h5>
                        <div class="d-flex">
                            <a class="btn btn-secondary btn-lg-square rounded-circle me-2 mt-1s" href="https://www.linkedin.com/in/muchamad-zainuri-a54a09251" target="_blank">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a class="btn btn-secondary btn-lg-square rounded-circle mx-2 mt-1s" href="https://instagram.com/jayzee_2s?igshid=ZGUzMzM3NWJiOQ==" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a class="btn btn-secondary btn-lg-square rounded-circle mx-2 mt-1s" href="https://github.com/MuchamadZainuri" target="_blank">
                                <i class="bi bi-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark py-3 border-top border-light">
            <p class="m-0 text-center text-white">
                <strong>Copyright &copy; 2023 <a class="text-decoration-none" href="https://github.com/MuchamadZainuri" style="color: #1D9FE4;" target="_blank">JayZee </a>.</strong> All rights reserved.
            </p>
        </div>
    </footer>
    <script>
        function cantik() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const halfHeight = scrollHeight / 4;
            const scrollTo = (scrollTop + halfHeight) - 160;

            window.scrollTo({
                top: scrollTo,
                behavior: "smooth",
            });
        }

        function elek() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const halfHeight = scrollHeight / 3;
            const scrollTo = (scrollTop + halfHeight) - 16;

            window.scrollTo({
                top: scrollTo,
                behavior: "smooth",
            });
        }

        function fspria() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const halfHeight = scrollHeight / 2;
            const scrollTo = (scrollTop + halfHeight) - 260;

            window.scrollTo({
                top: scrollTo,
                behavior: "smooth",
            });
        }

        function olah() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const halfHeight = scrollHeight / 2;
            const scrollTo = (scrollTop + halfHeight) + 320;

            window.scrollTo({
                top: scrollTo,
                behavior: "smooth",
            });
        }

        function hp() {
            const scrollHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const halfHeight = scrollHeight / 2;
            const scrollTo = (scrollTop + halfHeight) + 880;

            window.scrollTo({
                top: scrollTo,
                behavior: "smooth",
            });
        }

        var button1 = document.getElementById('Button1');
        var button2 = document.getElementById('Button2');

        if (button2.addEventListener) {
            button2.addEventListener('click', function() {
                button1.classList.remove('active');
                button2.classList.add('active');
            });
        }
        if (button1.addEventListener) {
            button1.addEventListener('click', function() {
                button2.classList.remove('active');
                button1.classList.add('active');
            });
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="/assets/script/fron.js"></script>

</html>