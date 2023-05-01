<?php
    include("header.html");
?>

<!--Form Tambah Buku-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                <h5>Tambah Data Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="data_kategori_simpan.php" method="post">
                                    <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control mt-2" placeholder="Nama Kategori" name="nama_kategori">
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("footer.html");
?>



