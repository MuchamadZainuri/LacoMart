<?php
include '../../../assets/script/dbkoneksi.php';

if (isset($_POST['act'])){
    if($_POST['act'] == 'create'){

        // var_dump($_POST);

        $kode = $_POST['kode'];
        $nama = $_POST['name'];
        $harbel = $_POST['harbel'];
        $harjul = $_POST['harjul'];
        $stok = $_POST['stok'];
        $min_stok = $_POST['min_stok'];
        $desc = $_POST['desc_produk'];
        $kategori = $_POST['kategori'];
        

        $split = explode(".", $_FILES['img']['name']);
        $ext = end($split);
        $img = $kode . "." . $ext;

        $tmp = $_FILES['img']['tmp_name'];
        $dir = '../../../assets/images/';

        move_uploaded_file($tmp, $dir.$img); 

        $sql = "INSERT INTO produk (kode, img, nama, harga_jual, harga_beli, stok, min_stok, deskripsi, kategori_produk_id) VALUES ('$kode', '$img', '$nama', '$harjul', '$harbel', '$stok', '$min_stok', '$desc', '$kategori')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location: index.php');
        }else{
            echo "Gagal";
        }
    }elseif($_POST['act'] == 'edit'){
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $nama = $_POST['name'];
        $harbel = $_POST['harbel'];
        $harjul = $_POST['harjul'];
        $stok = $_POST['stok'];
        $min_stok = $_POST['min_stok'];
        $desc = $_POST['desc_produk'];
        $kategori = $_POST['kategori'];

        $queryshow = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
        $row = mysqli_fetch_assoc($queryshow);

        if ($_FILES['img']['name'] == "") {
            $img = $row['img'];
        }else{
            $split = explode(".", $_FILES['img']['name']);
            $ext = end($split);
            $img = $kode . "." . $ext;
            $tmp = $_FILES['img']['tmp_name'];
            $dir = '../../../assets/images/';
            unlink($dir . $row['img']);
            move_uploaded_file($tmp, $dir.$img); 
        }

        $sql = "UPDATE produk SET kode='$kode', nama='$nama', harga_jual='$harjul', harga_beli='$harbel', stok='$stok', min_stok='$min_stok', deskripsi='$desc', kategori_produk_id='$kategori', img='$img' WHERE id='$id'";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location: index.php');
        }else{
            echo "Gagal";
        }
    }
}
if (isset($_GET['dl'])){
    $id = $_GET['dl'];

    $queryshow = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
    $row = mysqli_fetch_assoc($queryshow);

    unlink("../../../assets/images/".$row['img']);

    $sql = "DELETE FROM produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location: index.php');
    }else{
        echo "Gagal";
    }
}
