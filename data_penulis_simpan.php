<?php
include("koneksi.php");

if(empty($_POST['nama_penulis'])){
    echo "Nama penulis tidak boleh kosong";
    exit();
}

$nama_penulis = $_POST['nama_penulis'];
$query = mysqli_query($koneksi, "INSERT INTO data_penulis VALUES (null, '$nama_penulis')");

if ($query) {
    header('location: data_penulis.php');
} else {
    echo "Terjadi kesalahan saat menyimpan data penulis";
}
?>
