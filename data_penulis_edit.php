<?php
// koneksi ke database
include('header.html');
include("koneksi.php");

// mendapatkan id penulis dari URL
$id_penulis = $_GET['id'];

// mendapatkan data penulis yang akan diedit dari database
$ambil_data = mysqli_query($koneksi, "SELECT * FROM data_penulis WHERE id_penulis='$id_penulis'");
$data_penulis = mysqli_fetch_array($ambil_data);

// jika tombol update diklik
if (isset($_POST['update'])) {
    // mendapatkan data dari form
    $id_penulis = $_POST['id_penulis'];
    $nama_penulis = $_POST['nama_penulis'];

    // update data penulis ke database
    $update_data = mysqli_query($koneksi, "UPDATE data_penulis SET nama_penulis='$nama_penulis' WHERE id_penulis='$id_penulis'");

    // redirect ke halaman data penulis setelah selesai mengupdate
    if ($update_data) {
        header("location: data_penulis.php");
    } else {
        echo "Gagal mengupdate data penulis";
    }
}
?>

<!-- form edit data penulis -->
<section class="main m-3">
    <h2 class="judul mb-4">Edit Data Penulis</h2>
    <form action="data_penulis_edit.php?id=<?php echo $id_penulis; ?>" method="post">
        <div class="form-group">
            <label for="id_penulis">ID Penulis:</label>
            <input type="text" class="form-control" name="id_penulis" value="<?php echo $data_penulis['id_penulis']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_penulis">Nama Penulis:</label>
            <input type="text" class="form-control" name="nama_penulis" value="<?php echo $data_penulis['nama_penulis']; ?>">
        </div>
        <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
    </form>
</section>

<?php
    include('footer.html');
?>
