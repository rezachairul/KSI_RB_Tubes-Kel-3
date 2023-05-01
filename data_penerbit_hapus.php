<?php
include("koneksi.php");

// Mengambil ID penerbit dari parameter URL
$id_penerbit = $_GET['id'];

// Query untuk menghapus data penerbit dengan ID yang diambil dari URL
$query = "DELETE FROM data_penerbit WHERE id_penerbit='$id_penerbit'";
$hapus_data = mysqli_query($koneksi, $query);

// Jika data berhasil dihapus, maka akan redirect kembali ke halaman data_penerbit.php
if ($hapus_data) {
    echo "<script>alert('Data berhasil dihapus.');</script>";
    echo "<script>window.location.href='data_penerbit.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus.');</script>";
}
?>
