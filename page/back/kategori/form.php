<?php

include '../../../assets/script/dbkoneksi.php';

if (isset($_GET['ed'])) {
    $id = $_GET['ed'];
    $sql = "SELECT * FROM kategori_produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($query);

    $id = $row['id'];
    $nama = $row['nama'];
}else{
    $id = '';
    $nama = '';
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
    <link href="../../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/fkduk.css">
</head>

<body style="background-color: #f5f5f5;
            min-height: 100vh;">
    <div class="container-fluid">
        <div class="row head">
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
        <div class="row" style="min-height: 81.6vh;">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 m-auto">
                <div class="card border border-dark">
                    <div class="card-header text-center pt-3 bg-dark text-light">
                        <h5>Kelola Kategori</h5>
                    </div>
                    <br>
                    <br>
                    <div class="card-body">
                        <form method="post" action="proses.php">
                            <input type="hidden" value="<?= $id ?>" name="id">
                            <div class="form-group">
                                <div class="input-group" style="display: flex;justify-content: center;">
                                    <input id="nama_kategori" name="nama_kategori" placeholder="Kategori" type="text" required="required" value="<?= $nama ?>" class="input ">
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="form-group row">
                                <div class="text-center">
                                    <?php
                                    if (isset($_GET['ed'])) {
                                    ?>
                                        <button name="act" value="edit" type="submit" class="btn btn-primary">
                                            <i class="fas fa-floppy-disk"> </i>
                                            Save</button>

                                        <a href="index.php" class="btn btn-danger">
                                            <i class="fas fa-times-circle"> </i>
                                            Cancel</a>
                                    <?php
                                    } else {
                                    ?>
                                        <button name="act" value="create" type="submit" class="btn btn-primary">
                                            <i class="fas fa-file-circle-plus"></i>
                                            Create</button>
                                        <a href="index.php" class="btn btn-danger">
                                            <i class="fas fa-times-circle"> </i>
                                            Cancel</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <footer class="row bg-dark mt-auto" style="min-height: 10.2vh;
            line-height: 10.2vh;">
            <div class="container-fluid">
                <div class="small text-center">
                    <div class="text-light">Copyright &copy; Your Website 2023</div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>