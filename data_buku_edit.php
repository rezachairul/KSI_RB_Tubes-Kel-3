<?php
// koneksi ke database
include('header.html');
include("koneksi.php");

// mendapatkan id buku dari URL
$id_buku = $_GET['id'];

// mendapatkan data buku yang akan diedit dari database
$ambil_data = mysqli_query($koneksi, "SELECT * FROM data_buku WHERE id_buku='$id_buku'");
$data_buku = mysqli_fetch_array($ambil_data);

// jika tombol update diklik
if (isset($_POST['update'])) {
    // mendapatkan data dari form
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $id_penulis = $_POST['id_penulis'];
    $id_kategori = $_POST['id_kategori'];
    $tahun_buku = $_POST['tahun_buku'];
    $isbn_buku = $_POST['isbn_buku'];
    $sinopsis = $_POST['sinopsis'];
    $jumlah = $_POST['jumlah'];

    // update data buku ke database
    $update_data = mysqli_query($koneksi, "UPDATE data_buku SET judul_buku='$judul_buku', id_penulis='$id_penulis', id_kategori='$id_kategori', tahun_buku='$tahun_buku', isbn_buku='$isbn_buku', sinopsis='$sinopsis', jumlah='$jumlah' WHERE id_buku='$id_buku'");

    // redirect ke halaman data buku setelah selesai mengupdate
    if ($update_data) {
        header("location: data_buku.php");
    } else {
        echo "Gagal mengupdate data buku";
    }
}
?>

<!-- form edit data buku -->
<section class="main m-3">
    <h2 class="judul mb-4">Edit Data Buku</h2>
    <form action="data_buku_simpan.php" method="post">
        <div class="form-group">
            <label for="id_buku">ID Buku:</label>
            <input type="text" class="form-control" name="id_buku" value="<?php echo $data_buku['id_buku']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="judul_buku">Judul Buku:</label>
            <input type="text" class="form-control" name="judul_buku" value="<?php echo $data_buku['judul_buku']; ?>">
        </div>
        <div class="form-group">
            <label for="id_penulis">ID Penulis:</label>
            <input type="text" class="form-control" name="id_penulis" value="<?php echo $data_buku['id_penulis']; ?>">
        </div>
        <div class="form-group">
            <label for="id_kategori">ID Kategori:</label>
            <input type="text" class="form-control" name="id_kategori" value="<?php echo $data_buku['id_kategori']; ?>">
        </div>
        <div class="form-group">
            <label for="tahun_buku">Tahun:</label>
            <input type="text" class="form-control" name="tahun_buku" value="<?php echo $data_buku['tahun_buku']; ?>">
        </div>
        <div class="form-group">
            <label for="isbn_buku">ISBN:</label>
            <input type="text" class="form-control" name="isbn_buku" value="<?php echo $data_buku['isbn_buku']; ?>">
        </div>
        <div class="form-group">
            <label for="">Sinopsis</label>
            <input type="text" class="form-control mt-2"name="sinopsis"  value="<?php echo $data_buku['sinopsis']; ?>">
        </div>
        <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" class="form-control mt-2"name="jumlah"  value="<?php echo $data_buku['jumlah']; ?>">
        </div>
        <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
    </form>
</section>


<?php
    include('footer.html');
?>
