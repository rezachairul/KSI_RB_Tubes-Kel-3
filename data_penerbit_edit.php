<?php
// koneksi ke database
include('header.html');
include("koneksi.php");

// mendapatkan id penerbit dari URL
$id_penerbit = $_GET['id'];

// mendapatkan data penerbit yang akan diedit dari database
$ambil_data = mysqli_query($koneksi, "SELECT * FROM data_penerbit WHERE id_penerbit='$id_penerbit'");
$data_penerbit = mysqli_fetch_array($ambil_data);

// jika tombol update diklik
if (isset($_POST['update'])) {
    // mendapatkan data dari form
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];

    // update data penerbit ke database
    $update_data = mysqli_query($koneksi, "UPDATE data_penerbit SET nama_penerbit='$nama_penerbit' WHERE id_penerbit='$id_penerbit'");

    // redirect ke halaman data penerbit setelah selesai mengupdate
    if ($update_data) {
        header("location: data_penerbit.php");
    } else {
        echo "Gagal mengupdate data penerbit";
    }
}
?>

<!-- form edit data penerbit -->
<section class="main m-3">
    <h2 class="judul mb-4">Edit Data Penerbit</h2>
    <form action="data_penerbit_simpan.php" method="post">
        <div class="form-group">
            <label for="id_penerbit">ID Penerbit:</label>
            <input type="text" class="form-control" name="id_penerbit" value="<?php echo $data_penerbit['id_penerbit']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_penerbit">Nama Penerbit:</label>
            <input type="text" class="form-control" name="nama_penerbit" value="<?php echo $data_penerbit['nama_penerbit']; ?>">
        </div>
        <div class="form-group">
            <label for="nama_penerbit">Kota Penerbit:</label>
            <input type="text" class="form-control" name="kota_penerbit" value="<?php echo $data_penerbit['kota_penerbit']; ?>">
        </div>
        <input type="submit" class="btn btn-primary mt-3" name="update" value="Update">
    </form>
</section>

<?php
    include('footer.html');
?>
