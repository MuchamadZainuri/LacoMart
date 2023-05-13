<?php
include '../../../assets/script/dbkoneksi.php';
if (isset($_GET['vw'])) {
    $id = $_GET['vw'];
    $sql = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id='$id';");
    $row = mysqli_fetch_assoc($sql);
    $nama = $row['nama_pemesan'];
    $alamat = $row['alamat_pemesan'];
    $no_hp = $row['no_hp'];
    $tgl_pesan = $row['tanggal'];
    $email = $row['email'];
    $jumlah = $row['jumlah_pesanan'];
    $deskripsi = $row['deskripsi'];
    $id_produk = $row['produk_id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$id_produk'");
    $row2 = mysqli_fetch_assoc($sql);
    $nama_produk = $row2['nama'];
    $gambar = $row2['img'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pesanan</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/vpk.css">

</head>

<body>

    <body style="background-color: #f5f5f5;
            min-height: 100vh;">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 6vh;">
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="../index.php">LacoMart</a>
                    <!-- Sidebar Toggle-->
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- Navbar-->
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Settings</a></li>
                                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#!">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row m-auto" style="min-height: 64.5vh;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-end">
                            <div class="mb-2 fz"><?= $tgl_pesan ?></div>
                            <div class="row text-center">
                                <div class="col-md-12 m-auto">
                                    <img src="../../../assets/images/<?= $gambar ?>" class="img-fluid rounded-start mb-1" alt="Gambar" style="width:13rem ;">
                                    <div class="text-start fz">Produk : <?= $nama_produk ?></div>
                                    <div class="text-start fz">Jumlah : <?= $jumlah ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-5 py-3">
                            <div class="row">
                                <div class="col-5">
                                    <p class="fz">Nama Pemesan</p>
                                </div>
                                <div class="col-7">
                                    <p class="fz"><?= $nama ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="fz">Alamat</p>
                                </div>
                                <div class="col-7">
                                    <p class="fz"><?= $alamat ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="fz">No. Handphone</p>
                                </div>
                                <div class="col-7">
                                    <p class="fz"><?= $no_hp ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="fz">Email</p>
                                </div>
                                <div class="col-7">
                                    <p class="fz"><?= $email ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="fz">Catatan</p>
                                </div>
                                <div class="col-7">
                                    <p class="fz"><?= $deskripsi ?></p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col text-end">
                                    <a href="index.php" class="btn btn-outline-primary">Kembali &nbsp;<i class="fa-solid fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <footer class="row bg-dark" style="min-height: 10.2vh;line-height: 10.2vh; margin-top: 10vh ;">
                <div class=" container-fluid px-4">
                    <div class="small text-center">
                        <div class="text-light">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>

</html>