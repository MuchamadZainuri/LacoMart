<?php
include '../../../assets/script/dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
    $nama = $data['nama_pemesan'];
    $alamat = $data['alamat_pemesan'];
    $no_hp = $data['no_hp'];
    $email = $data['email'];
    $tanggal = $data['tanggal'];
    $jumlah = $data['jumlah_pesanan'];
    $deskripsi = $data['deskripsi'];
} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Form</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/fpruk.css">

</head>

<body style="background-color: #f5f5f5;
            min-height: 100vh;">
    <div class="container-fluid">
        <div class="row">
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
        <br>
        <br>
        <div class="row" style="min-height: 65vh;">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 m-auto">
                <div class="card-beda">
                    <div class="card border border-dark">
                        <div class="card-header text-center pt-3 bg-dark text-light mb-2">
                            <h5>Kelola Pesanan</h5>
                        </div>
                        <div class="card-body px-4">
                            <form method="POST" action="proses.php" id="sweet">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group row">
                                    <label for="tgl_pesan" class="col-4 col-form-label">Tanggal</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                </div>
                                            </div>
                                            <?php

                                            ?>
                                            <input id="tgl_pesan" name="tgl_pesan" type="text" class="form-control" value="<?= $tanggal ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama Pelanggan</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            </div>
                                            <input id="nama" name="nama" type="text" class="form-control" value="<?= $nama ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <textarea id="alamat" name="alamat" cols="40" rows="2" class="form-control"><?= $alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-4 col-form-label">No HP</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+62</div>
                                            </div>
                                            <input id="no_hp" name="no_hp" type="text" class="form-control" value="<?= $no_hp ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" type="text" class="form-control" value="<?= $email ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jmlh" class="col-4 col-form-label">Jumlah Barang</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="jmlh" name="jmlh" type="text" class="form-control" value="<?= $jumlah ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Qty</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="catat" class="col-4 col-form-label">Catatan</label>
                                    <div class="col-8">
                                        <textarea id="catat" name="catat" cols="40" rows="3" class="form-control"><?= $deskripsi ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <input type="hidden" name="edit">
                                        <button type="submit" class="btn btn-primary ubahButton">
                                            <i class="fas fa-file-circle-plus"></i>
                                            Save
                                        </button>
                                        <a href="index.php" class="btn btn-danger">
                                            <i class="fas fa-times-circle"> </i>
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <br>
        <br>
        <br>
        <footer class="row bg-dark" style="min-height: 8vh;
            line-height: 8vh;">
            <div class="container-fluid">
                <div class="small text-center">
                    <div class="text-light">Copyright &copy; Your Website 2023</div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.querySelector('#sweet').addEventListener('submit', function(event) {
            event.preventDefault();
            const submitButtonClass = event.submitter.className;
            if (submitButtonClass === 'btn btn-primary submitButton') {
                var text = 'Data berhasil ditambahkan';
            } else if (submitButtonClass === 'btn btn-primary ubahButton') {
                var text = 'Data berhasil diubah';
            }
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: text,
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                event.target.submit();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="../../../assets/script/fpruk.js"></script>
</body>

</html>