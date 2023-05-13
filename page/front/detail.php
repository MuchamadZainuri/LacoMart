<?php

require_once "../../assets/script/dbkoneksi.php";
if(!isset($_GET['id'])){
    header('location:../../index.php');
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LacoMart - Detail Produk</title>
    <!-- <link rel="stylesheet" href="assets/css/front.css"> -->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="home">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-body-tertiar bg-secondary">
        <div class="container px-4 px-lg-2">
            <a class="navbar-brand" href="../../index.php">
                <img src="../../assets/images/icon.svg" alt="logo" class="bg-light ps-2 py-2 rounded-3 logo">
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
                            <button class="btn btn-light rounded-start-5 keren" type="submit">
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
                    <a href="cart.php" class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Keranjang
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $pesanan['jumlah'] ?></span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-4">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card o-hidden border-1 shadow-lg my-5 kartu" style="border-color: #1D9FE4;">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-6 d-lg-block">
                                            <img src="../../assets/images/<?= $data['img'] ?>" alt="" width="100%" height="100%" class="p-4">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="pt-4 gg">
                                                <div class="text-center border-bottom">
                                                    <h1 class="h2 mb-2 fw-bold"><?= $data['nama'] ?></h1>
                                                    <div class="text-start kode">
                                                        <p style="font-size: small; margin-bottom: 8px;">Kode:
                                                            <?= $data['kode'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3 satu">
                                                <div class="col-5 fw-bold huruf pt-2">
                                                    Harga
                                                </div>
                                                <?php
                                                $harga = number_format($data['harga_jual'], 0, '.', '.');
                                                ?>
                                                <div class="col fs-4 fw-bold text-primary-emphasis" style="cursor: pointer;">
                                                    <?= "Rp" . $harga   ?>
                                                </div>
                                            </div>
                                            <div class="row my-3 satu">
                                                <div class="col-5 fw-bold huruf">
                                                    Keterangan
                                                </div>
                                                <div class="col huruf">
                                                    <?php
                                                    $str = $data['deskripsi'];
                                                    $str = str_replace(',', ',<br>', $str);
                                                    ?>
                                                    <?= $str ?>
                                                </div>
                                            </div>
                                            <div class="row my-3 satu">
                                                <span class="text-muted" style="font-size: smaller; padding-left: 45%;">Stok-<?= $data['stok'] ?> </span> <br>
                                                <div class="col-5 fw-bold huruf pt-1">
                                                    Jumlah
                                                </div>
                                                <div class="col">
                                                    <button id="decrement" onclick="stepper(this)"> - </button>
                                                    <input type="number" min="1" max="<?= $data['stok'] ?>" value="1" step="1" id="my-input" readonly>
                                                    <button id="increment" onclick="stepper(this)"> + </button>
                                                </div>
                                            </div>
                                            <div class="row mb-3 satu">
                                                <div class="col-5 fw-bold huruf">
                                                    Kategori Produk
                                                </div>
                                                <?php
                                                $id_kategori = $data['kategori_produk_id'];
                                                $query = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE id = '$id_kategori'");
                                                $data2 = mysqli_fetch_assoc($query);
                                                ?>
                                                <div class="col huruf">
                                                    <?= $data2['nama'] ?>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col text-center">
                                                    <!-- Button trigger modal -->
                                                    <a href="" class="btn btn-success pesan" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pesan <i class="bi bi-bag-fill"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pesan Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="../back/pesanan/proses.php">
                            <input type="hidden" name="id_produk" value="<?= $id ?>">
                            <div class="text-end pt-2">
                                <input type="text" id="tanggal" name="tanggal" value="<?php echo date('d-m-Y'); ?>" readonly class="text-muted" style="border-style:none; color: #000; width:90pt;cursor: no-drop;font-weight: bold;">
                            </div>
                            <div class="modal-body px-5 py-2">
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label text-start">Nama</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                            </div>
                                            <input id="nama" name="nama" placeholder="Nama Anda" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label text-start">Alamat</label>
                                    <div class="col-8">
                                        <textarea id="alamat" name="alamat" cols="40" rows="2" class="form-control" required="required" aria-describedby="alamatHelpBlock"></textarea>
                                        <span id="alamatHelpBlock" class="form-text text-muted text-start">*AlamatLengkap</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nohp" class="col-4 col-form-label text-start">No Handphone</label>
                                    <div class="col-8">
                                        <input id="nohp" name="nohp" placeholder="0812281****" type="text" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label text-start">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="ex:Gondrong@rty.id" type="email" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="produk" class="col-4 col-form-label text-start">Produk</label>
                                    <div class="col-8">
                                        <input id="produk" name="produk" value="<?= $data['nama'] ?>" placeholder="ex:Gondrong@rty.id" type="text" class="form-control" required="required" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-4 col-form-label text-start">Jumlah</label>
                                    <div class="col-8">
                                        <input type="number" id="jumlah" name="jumlah" value="1" class="form-control" required="required" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catat" class="col-4 col-form-label text-start">Catatan</label>
                                    <div class="col-8">
                                        <textarea id="catat" name="catat" cols="40" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col text-end cuco">
                                </div>
                                <div class="col text-end">
                                    Total Harga :
                                    <span class="fs-3 text-muted fw-bold" id="total"> <?= "Rp" . " " . $harga ?></span>
                                </div>
                                <div class="col-3 text-start ps-4">
                                    <button name="create" type="submit" class="btn btn-success px-3 py-2">Checkout &nbsp;<i class="bi bi-cash-stack"></i></button>
                                </div>
                            </div>
                        </form>
                        <input type="hidden" id="harga" value="<?= $data['harga_jual'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="about">
        <div class="container-fluid bg-dark text-light py-5">
            <div class="container py-4">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <img src="../../assets/images/icon.svg" alt="icon" width="165" class="mb-3 ps-3 py-2 bg-light rounded rounded-4">
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
                        <form action="../../page/back/index.php">
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
        const myInput = document.getElementById("my-input");

        function stepper(btn) {
            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (id == "increment") ? (step * 1) : (step * -1);
            let newValue = parseInt(val) + calcStep;
            let harga = document.getElementById("harga").value;


            if (newValue >= min && newValue <= max) {
                myInput.setAttribute("value", newValue);
                document.getElementById("jumlah").value = newValue;
            }
            if (newValue > 0) {
                let total = harga * newValue;
                let format = total.toLocaleString("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0
                });
                document.getElementById("total").innerHTML = format;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>