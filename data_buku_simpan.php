<?php
include("koneksi.php");

if(empty($_POST['judul_buku']) || empty($_POST['id_penulis']) || empty($_POST['id_kategori']) || empty($_POST['tahun_buku']) || empty($_POST['isbn_buku']) || empty($_POST['sinopsis']) || empty($_POST['jumlah'])){
    echo "Semua field harus diisi";
    exit();
}

$judul_buku = $_POST['judul_buku'];
$id_penulis = $_POST['id_penulis'];
$id_kategori = $_POST['id_kategori'];
$tahun_buku = $_POST['tahun_buku'];
$isbn_buku = $_POST['isbn_buku'];
$sinopsis = $_POST['sinopsis'];
$jumlah = $_POST['jumlah'];

$query = mysqli_query($koneksi, "INSERT INTO data_buku VALUES (null, '$judul_buku', '$id_penulis', '$id_kategori', '$tahun_buku', '$isbn_buku', '$sinopsis', '$jumlah')");

if ($query) {
    header('location: data_buku.php');
} else {
    echo "Terjadi kesalahan saat menyimpan data buku";
}
?>
