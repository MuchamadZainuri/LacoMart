<?php
include '../../../assets/script/dbkoneksi.php';

if (isset($_POST['create'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['nohp'];
        $email = $_POST['email'];
        $jumlah = $_POST['jumlah'];
        $deskripsi = $_POST['catat'];
        $produk_id = $_POST['id_produk'];
        $tanggal = $_POST['tanggal'];
        $sql =  "INSERT INTO pesanan (tanggal, nama_pemesan, alamat_pemesan, no_hp, email, jumlah_pesanan, deskripsi, produk_id) VALUES ( '$tanggal', '$nama', '$alamat', '$no_hp', '$email', '$jumlah', '$deskripsi', '$produk_id')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location: ../../front/cart.php');
        }else{
            echo "Gagal";
        }
    }
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $tanggal = $_POST['tgl_pesan'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];   
        $jumlah = $_POST['jmlh'];
        $deskripsi = $_POST['catat'];
        $sql = "UPDATE pesanan SET tanggal='$tanggal', nama_pemesan='$nama', alamat_pemesan='$alamat', no_hp='$no_hp', email='$email', jumlah_pesanan='$jumlah', deskripsi='$deskripsi' WHERE id='$id'";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            header('location: index.php');
        }else{
            echo "Gagal";
        }
    }

if (isset($_GET['dl'])){
    $id = $_GET['dl'];
    $sql = "DELETE FROM pesanan WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header('location: index.php');
    }else{
        echo "Gagal";
    }
}
