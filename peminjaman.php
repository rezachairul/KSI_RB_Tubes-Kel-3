<?php
    include("koneksi.php");

    if(empty($_POST['nama'])){
        echo "Nama peminjam tidak boleh kosong";
        exit();
    }

    if(empty($_POST['judul_buku'])){
        echo "Judul buku tidak boleh kosong";
        exit();
    }

    $nama_peminjam = $_POST['nama'];
    $judul_buku = $_POST['judul_buku'];

    // cek apakah buku tersedia
    $query_buku = mysqli_query($koneksi, "SELECT * FROM data_buku WHERE judul_buku = '$judul_buku'");
    $jumlah_buku = mysqli_num_rows($query_buku);

    if ($jumlah_buku <= 0) {
        echo "Buku tidak tersedia";
        exit();
    }

    // cek apakah peminjam sudah meminjam buku yang sama
    $query_pinjam = mysqli_query($koneksi, "SELECT * FROM data_pinjam WHERE nama_peminjam = '$nama_peminjam' AND judul_buku = '$judul_buku'");
    $jumlah_pinjam = mysqli_num_rows($query_pinjam);

    if ($jumlah_pinjam > 0) {
        echo "Anda sudah meminjam buku yang sama";
        exit();
    }

    // insert data peminjaman
    $tanggal_pinjam = date("Y-m-d");
    $tanggal_kembali = date("Y-m-d", strtotime("+7 days"));

    $query = mysqli_query($koneksi, "INSERT INTO data_pinjam (nama_peminjam, judul_buku, tanggal_pinjam, tanggal_kembali) VALUES ('$nama_peminjam', '$judul_buku', '$tanggal_pinjam', '$tanggal_kembali')");

    if ($query) {
        echo "Peminjaman berhasil";
    } else {
        echo "Terjadi kesalahan saat meminjam buku";
    }
?>
