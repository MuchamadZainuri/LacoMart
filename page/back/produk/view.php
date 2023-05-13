<?php
include '../../../assets/script/dbkoneksi.php';
if (isset($_GET['vw'])) {
    $id = $_GET['vw'];
    $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id';");
    $row = mysqli_fetch_assoc($sql);
    $kode = $row['kode'];
    $nama_produk = $row['nama'];
    $harbel = $row['harga_beli'];
    $harjul = $row['harga_jual'];
    $stok = $row['stok'];
    $min_stok = $row['min_stok'];
    $desc = $row['deskripsi'];
    $kategori = $row['kategori_produk_id'];
    $img = $row['img'];
    $sql = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE id = '$kategori'");
    $row = mysqli_fetch_assoc($sql);
    $nama_kategori = $row['nama'];
} else {
    header('location:../produk');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Produk</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/vpk.css">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        .accordion-button:focus {
            border-color: #fff;
            z-index: 6;
            box-shadow: none;
            outline: 0;
        }

        .accordion-button::after {
            color: #fff;
        }

        .accordion-button:not(.collapsed) {
            background-color: #fff;
            color: #000;
        }
    </style>
</head>

<body style="background-color: #f5f5f5;
            min-height: 100vh;">
    <div class="container-fluid">
        <div class="row ">
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
        <div class="row" style="min-height: 81.5vh;">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 d-flex align-items-center justify-content-center" style="flex-direction: column;">
                <div class="card">
                    <div class="card-header fs-5 text-center fw-bold">
                        <?= $nama_produk ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center justify-content-center">
                                <img src="../../../assets/images/<?= $img ?>" class="card-img-top" style="width:90%;">
                            </div>
                            <div class="col-md-7">
                                <div class="row m-3">
                                    <div class="col-4">
                                        Kode Produk
                                    </div>
                                    <div class="col-8 ">
                                        : <?= $kode ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Harga Jual
                                    </div>
                                    <div class="col-8">
                                        : <?= "Rp" .   number_format($harjul, 0, '.', '.') ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Harga Beli
                                    </div>
                                    <div class="col-8">
                                        : <?= "Rp" .   number_format($harbel, 0, '.', '.') ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Stok
                                    </div>
                                    <div class="col-8">
                                        : <?= $stok ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Stok Minimal
                                    </div>
                                    <div class="col-8">
                                        : <?= $min_stok ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Keterangan
                                    </div>
                                    <div class="col-8">
                                        : <?= $desc ?>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-4">
                                        Kategori Produk
                                    </div>
                                    <div class="col-8">
                                        : <?= $nama_kategori ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="tombol text-center">
                <a href="index.php" class="button2">Back</a>
            </div>
        </div>
        <footer class="row bg-dark p" style="min-height: 10.2vh;line-height: 10.2vh;">
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