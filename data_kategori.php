<?php
    include("koneksi.php");
    $query = mysqli_query($koneksi, "SELECT * FROM data_kategori");
?>

<body>
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpusda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html
                    ">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Data Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="data_buku.php">Buku</a></li>
                    <li><a class="dropdown-item" href="data_penulis.php">Penulis</a></li>
                    <li><a class="dropdown-item" href="data_penerbit.php">Penerbit</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php" tabindex="-1" aria-disabled="true">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">LogOut</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>

    </body>

<!--Tabel -->
<section class="main m-3">
    <h2 class="judul mb-4">Data Kategori</h2>
    <a href="data_kategori_tambah.php"><button type="button" class="btn btn-primary">Tambah</button></a>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($ambil_data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['id_kategori']; ?></td>
                <td><?php echo $ambil_data['nama_kategori']; ?></td>
                <td>
                    <a href="data_kategori_edit.php?id=<?php echo $ambil_data['id_kategori']; ?>"><button type="button" class="btn btn-success">Edit</button></a>
                    <a href="data_kategori_hapus.php?id=<?php echo $ambil_data['id_kategori']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>

            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?php
    include("footer.html");
?>
