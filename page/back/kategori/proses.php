<?php
include '../../../assets/script/dbkoneksi.php';

if (isset($_POST['act'])){
    if($_POST['act'] == 'create'){
        $nama = $_POST['nama_kategori'];
        $sql = "INSERT INTO kategori_produk (nama) VALUES ('$nama')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location: index.php');
        }else{
            echo "Gagal";
        }
    }elseif($_POST['act'] == 'edit'){
        $id = $_POST['id'];
        $nama = $_POST['nama_kategori'];
        $sql = "UPDATE kategori_produk SET nama='$nama' WHERE id='$id'";
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
    $sql = "DELETE FROM kategori_produk WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location: index.php');
    }else{
        echo "Gagal";
    }
}
?>