<?php
    include("koneksi.php");
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM data_kategori WHERE id_kategori = '$id'");
    if ($query) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>location='data_kategori.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');</script>";
        echo "<script>location='data_kategori.php';</script>";
    }
?>
