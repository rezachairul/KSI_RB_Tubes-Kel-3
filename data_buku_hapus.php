<?php
// koneksi ke database
include("koneksi.php");

// mendapatkan id buku dari URL
$id_buku = $_GET['id'];

// menghapus data buku dari database
$hapus_data = mysqli_query($koneksi, "DELETE FROM data_buku WHERE id_buku='$id_buku'");

// redirect ke halaman data buku setelah selesai menghapus
if ($hapus_data) {
    header("location: data_buku.php");
} else {
    echo "Gagal menghapus data buku";
}
?>
