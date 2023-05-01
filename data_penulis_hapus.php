<?php
    include("koneksi.php");

    // mendapatkan id penulis dari URL
    $id_penulis = $_GET['id'];

    // menghapus data penulis dari database
    $hapus_data = mysqli_query($koneksi, "DELETE FROM data_penulis WHERE id_penulis='$id_penulis'");

    // redirect ke halaman data penulis setelah selesai menghapus
    if ($hapus_data) {
        header("location: data_penulis.php");
    } else {
        echo "Gagal menghapus data penulis";
    }
?>
