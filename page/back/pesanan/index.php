<?php
include '../../../assets/script/dbkoneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM pesanan ;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="../../../assets/images/icon2.svg" type="image/x-icon" sizes="42x42">
    <title>Admin - Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        #datatablesSimple>thead>tr>th:nth-child(2) {
            width: 10%;
        }

        #datatablesSimple>thead>tr>th:nth-child(4) {
            width: 24%;
        }

        #datatablesSimple>thead>tr>th:nth-child(5) {
            width: 17%;
        }

        #datatablesSimple>thead>tr>th:nth-child(3) {
            width: 17%;
        }

        #datatablesSimple>thead>tr>th:nth-child(6) {
            width: 9%;
        }

        #datatablesSimple>thead>tr>th:nth-child(1) {
            width: 6%;
        }

        #datatablesSimple>tbody>tr>td:nth-child(1) {
            text-align: center;
        }

        #datatablesSimple>tbody>tr>td:nth-child(6) {
            text-align: center;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php"> <img src="../../../assets/images/icon.svg" alt="icon.svg" width="60%" height="50%"></a>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary btn-search" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
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
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-simple"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Market</div>
                        <a class="nav-link" href="../kategori/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Kategori Produk
                        </a>
                        <a class="nav-link" href="../produk/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            List Produk
                        </a>
                        <a class="nav-link" href="../pesanan/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Pesanan
                        </a>
                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Profile
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer nav-foot">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>
                    <div class="card mb-3">
                        <div class="card-body">
                            Dibawah ini adalah list pesanan yang masuk ke LacoMart dari pelanggan. Silahkan lakukan konfirmasi pembayaran dan pengiriman barang. Terima kasih. :)
                        </div>
                    </div>
                    <div class="row mb-2 d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="text-start">
                                <form method="POST">
                                    <button type="submit" name="refresh" href="index.php" class="btn btn-success">
                                        Refresh &nbsp;<i class="fa-solid fa-arrows-rotate"></i>
                                    </button>
                                </form>
                                <?php
                                if (isset($_POST['refresh'])) {
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>
                                            Nama Pelanggan
                                        </th>
                                        <th>
                                            Alamat
                                        </th>
                                        <th>
                                            Produk
                                        </th>
                                        <th class="text-center">
                                            Jumlah
                                        </th>
                                        <th class="text-center">
                                            Options
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['nama_pemesan'] ?></td>
                                            <td><?= $row['alamat_pemesan'] ?></td>
                                            <?php
                                            $produk_id = $row['produk_id'];
                                            $query2 = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$produk_id'");
                                            $row2 = mysqli_fetch_assoc($query2);
                                            ?>
                                            <td class="text-center"><?= $row2['nama'] ?></td>
                                            <td class="text-center"><?= $row['jumlah_pesanan'] ?></td>
                                            <td class="text-center">
                                                <a href="view.php?vw=<?= $row['id'] ?>" class="btn btn-primary">
                                                    <i class="fas fa-eye"> </i>
                                                </a>
                                                <a href="form.php?id=<?= $row['id'] ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"> </i>
                                                </a>
                                                <a href="proses.php?dl=<?= $row['id'] ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="small text-center">
                        <div class="text-muted">Copyright &copy; 2023 LacoMart@Company</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../../assets/script/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../../assets/script/datatables-simple-demo.js"></script>
</body>

</html>