<?php
include '../../../assets/script/dbkoneksi.php';

if (isset($_GET['ed'])) {
    $id = $_GET['ed'];
    $sql = "SELECT * FROM produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
    $kode = $data['kode'];
    $nama = $data['nama'];
    $harbel = $data['harga_beli'];
    $harjul = $data['harga_jual'];
    $stok = $data['stok'];
    $min_stok = $data['min_stok'];
    $desc = $data['deskripsi'];
    $kat = $data['kategori_produk_id'];
    $foto = $data['img'];
} else {
    $id = '';
    $kode = '';
    $nama = '';
    $harbel = '';
    $harjul = '';
    $stok = '';
    $min_stok = '';
    $desc = '';
    $kat = '';
    $foto = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/fpruk.css">

</head>

<body style="background-color: #f5f5f5;
            min-height: 100vh;">
    <div class="container-fluid">
        <div class="row mb-2">
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
        <div class="row" style="min-height: 82.5vh;">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 m-auto">
                <div class="card-beda">
                    <div class="card border border-dark">
                        <div class="card-header text-center pt-3 bg-dark text-light mb-2">
                            <h5>Kelola Produk</h5>
                        </div>
                        <div class="card-body px-4">
                            <form method="POST" action="proses.php" enctype="multipart/form-data" id="sweet">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Kode</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="kode" name="kode" placeholder="Kode Produk" type="text" class="form-control" required="required" value="<?= $kode ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa fa-cogs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="name" name="name" placeholder="Nama Produk" type="text" class="form-control" required="required" value="<?= $nama ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="upload-img" class="col-4 col-form-label">Foto Produk</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="upload-img" name="img" type="file" class="form-control" value="<?= $foto ?>" accept="image/jpg, image/png, image/jpeg" <?php
                                                                                                                                                                                if (!isset($_GET['ed'])) {
                                                                                                                                                                                    echo "required";
                                                                                                                                                                                }
                                                                                                                                                                                ?> />
                                        </div>
                                        <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harbel" class="col-4 col-form-label">Harga Beli</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input id="harbel" name="harbel" type="text" class="form-control" required="required" value="<?= $harbel ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harjul" class="col-4 col-form-label">Harga Jual</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp</div>
                                            </div>
                                            <input id="harjul" name="harjul" type="text" class="form-control" required="required" value="<?= $harjul ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-4 col-form-label">Stok</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="stok" name="stok" type="text" class="form-control" required value="<?= $stok ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Qty</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_stok" class="col-4 col-form-label">Min Stok</label>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input id="min_stok" name="min_stok" type="text" class="form-control" required="required" value="<?= $min_stok ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Qty</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc_produk" class="col-4 col-form-label">Deskripsi Produk</label>
                                    <div class="col-8">
                                        <textarea id="desc_produk" name="desc_produk" cols="40" rows="5" class="form-control"><?= $desc ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kat_produk" class="col-4 col-form-label">Kategori Produk</label>
                                    <div class="col-8">
                                        <?php
                                        $sql = "SELECT * FROM kategori_produk";
                                        $query = mysqli_query($koneksi, $sql);
                                        ?>
                                        <select id="kategori" name="kategori" class="custom-select" required>
                                            <?php
                                            while ($kategori = mysqli_fetch_array($query)) {
                                                $sel = ($kategori['id'] == $kat) ? "selected" : "";
                                            ?>
                                                <option value="<?= $kategori['id'] ?>" <?= $sel ?>> <?= $kategori['nama'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <?php
                                        if (isset($_GET['ed'])) {
                                        ?>
                                            <input type="hidden" name="act" value="edit">
                                            <button type="submit" class="btn btn-primary ubahButton">
                                                <i class="fas fa-file-circle-plus"></i>
                                                Save</button>
                                        <?php
                                        } else {
                                        ?>
                                            <input type="hidden" name="act" value="create">
                                            <button type="submit" class="btn btn-primary submitButton">
                                                <i class="fas fa-file-circle-plus"></i>
                                                Create</button>
                                        <?php
                                        }
                                        ?>
                                        <a href="index.php" class="btn btn-danger">
                                            <i class="fas fa-times-circle"> </i>
                                            Cancel</a>
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