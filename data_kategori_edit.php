<?php
    include('header.html');
    include("koneksi.php");

    // cek apakah parameter id telah diterima
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // query untuk mengambil data kategori dengan id yang diberikan
        $query = mysqli_query($koneksi, "SELECT * FROM data_kategori WHERE id_kategori='$id'");

        // cek apakah data ditemukan
        if(mysqli_num_rows($query) > 0) {
            $ambil_data = mysqli_fetch_array($query);
        } else {
            // jika data tidak ditemukan, redirect ke halaman data_kategori.php
            header('location:data_kategori.php');
        }
    } else {
        // jika parameter id tidak diberikan, redirect ke halaman data_kategori.php
        header('location:data_kategori.php');
    }

    // cek apakah form telah disubmit
    if(isset($_POST['submit'])){
        $nama_kategori = $_POST['nama_kategori'];

        // query untuk update data kategori dengan id yang diberikan
        $update = mysqli_query($koneksi, "UPDATE data_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id'");

        // cek apakah update berhasil
        if($update){
            // jika berhasil, redirect ke halaman data_kategori.php
            header('location:data_kategori.php');
        }else{
            // jika gagal, tampilkan pesan error
            echo 'Gagal mengupdate data!';
        }
    }
?>

<body>
    <div class="container">
        <h2 class="judul mt-4">Edit Data Kategori</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $ambil_data['nama_kategori']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <?php
        include("footer.html");
    ?>
</body>
