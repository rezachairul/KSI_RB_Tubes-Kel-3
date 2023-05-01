<?php
include("koneksi.php");

if(empty($_POST['nama_kategori'])){
    echo "Nama kategori tidak boleh kosong";
    exit();
}

$nama_kategori = $_POST['nama_kategori'];
$query = mysqli_query($koneksi, "INSERT INTO data_kategori VALUES (null, '$nama_kategori')");

if ($query) {
    header('location: data_kategori.php');
} else {
    echo "Terjadi kesalahan saat menyimpan data kategori";
}
?>
