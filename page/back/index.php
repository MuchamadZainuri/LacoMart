<?php
require_once '../../assets/script/dbkoneksi.php';
//hitung jumlah data pada tabel produk
$sql = "SELECT COUNT(*) AS jumlah FROM produk";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
$stok = $row['jumlah'];

//hitung jumlah data pada tabel pesanan
$sql = "SELECT COUNT(*) AS jumlah FROM pesanan";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
$new_order = $row['jumlah'];

//hitung jumlah data pada row jumlah pesanan pada tabel pesanan
$sql = "SELECT SUM(jumlah_pesanan) AS jumlah FROM pesanan";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
$sale = $row['jumlah'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="../../assets/images/icon2.svg" type="image/x-icon" sizes="42x42">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/back.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark nav-top">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><img src="../../assets/images/icon.svg" alt="icon.svg" width="60%" height="50%"></a>
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
                    <li><a class="dropdown-item" href="../../index.php">Logout</a></li>
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
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-simple"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Market</div>
                        <a class="nav-link" href="kategori/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Kategori Produk
                        </a>
                        <a class="nav-link" href="produk/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            List Produk
                        </a>
                        <a class="nav-link" href="pesanan/index.php">
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
                    <div class="row mb-3">
                        <div class="col-xl-9 col-md-6">
                            <h3 class="mt-4">Dashboard</h3>
                            <?php
                            $hari = array(
                                1 =>    'Senin',
                                'Selasa',
                                'Rabu',
                                'Kamis',
                                'Jumat',
                                'Sabtu',
                                'Minggu'
                            );
                            ?>
                            <div class="mb-4 tgl"><a href=""><b><?= $hari[date('N')] ?></b></a>
                                <?php
                                // Menampilkan tanggal bulan dan tahun ini dalam bahasa Indonesia
                                $bulan = array(
                                    1 =>   'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                );
                                // waktu indonesia dan am pm
                                date_default_timezone_set('Asia/Jakarta');


                                echo '∙ ' . date('j') . ' ' . $bulan[date('n')] . ' ' . date('Y') . '' . ' ∙ ' . date('H:i A');
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="d-flex align-items-center justify-content-evenly tglkanan">
                                <i class="fas fa-calendar"></i>
                                <div class="cards">
                                    <?= $bulan[date('n')] . ' ' . date('j') . ', ' . date('Y') . ' - ' . $bulan[date('n')] . ' ' . date('j') . ', ' . date('Y') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4 p-2">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div class="col-6">
                                        <h4>
                                            Welcome back, Admin! <br>
                                        </h4>
                                        <p class="text-dashboard">Greate to see you again, Let's get some work done!</p>
                                        <div class="btn buton1">Get Started <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <img src="../../assets/images/admin.svg" alt="iconadmin.png" width="85%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h2><?= $new_order ?></h2>
                                            Pesanan Baru
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h2><?= $stok ?></h2>
                                            Stok Produk
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h2>Rp 805.000,-</h2>
                                            Pendapatan
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h2><?= $sale - 5 ?></h2>
                                            Produk Terjual
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Produk Terbaru
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        include "../../assets/script/dbkoneksi.php";
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM produk order by id desc limit 5;");
                                        ?>
                                        <table class="table table-bordered table-hover" id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Harga Beli</th>
                                                    <th class="text-center">Stok</th>
                                                    <th>Kategori</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($data = mysqli_fetch_array($query)) {
                                                ?>

                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <td><?= $data['kode'] ?></td>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td><?= "Rp" . number_format($data['harga_beli'], 0, '.', '.') ?></td>
                                                        <td class="text-center"><?= $data['stok'] ?></td>
                                                        <td>
                                                            <?php
                                                            $id_kategori = $data['kategori_produk_id'];
                                                            $query2 = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE id = '$id_kategori'");
                                                            $data2 = mysqli_fetch_array($query2);
                                                            echo $data2['nama'];
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="produk/view.php?vw=<?= $data['id'] ?>" class="btn btn-secondary"><i class="fa-regular fa-eye"></i></a>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Hasil Penjualan Per Hari
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="50"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Hasil Penjualan Per Kategori
                                </div>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="small text-center">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/script/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/script/chart-area-demo.js"></script>
    <script src="../../assets/script/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../../assets/script/datatables-simple-demo.js"></script>
</body>

</html>