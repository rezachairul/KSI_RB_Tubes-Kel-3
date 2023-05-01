<?php
include("koneksi.php");

if(empty($_POST['nama_penerbit']) || empty($_POST['kota_penerbit'])){
    echo "Nama penerbit dan kota penerbit tidak boleh kosong";
    exit();
}

$nama_penerbit = $_POST['nama_penerbit'];
$kota_penerbit = $_POST['kota_penerbit'];

$query = mysqli_query($koneksi, "INSERT INTO data_penerbit VALUES (null, '$nama_penerbit', '$kota_penerbit')");

if ($query) {
    header('location: data_penerbit.php');
} else {
    echo "Terjadi kesalahan saat menyimpan data penerbit";
}
?>
