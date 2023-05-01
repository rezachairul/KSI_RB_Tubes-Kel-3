<?php
    include("header.html");
?>


<!--Form Tambah Buku-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                <h5>Tambah Data Buku</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="data_buku_simpan.php" method="post">
                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" class="form-control mt-2" placeholder="Judul Buku" name="judul_buku">
                                </div>
                                <div class="form-group">
                                    <label for="">ID Penulis</label>
                                    <input type="text" class="form-control mt-2" placeholder="ID Penulis" name="id_penulis">
                                </div>
                                <div class="form-group">
                                    <label for="">ID Kategori</label>
                                    <input type="text" class="form-control mt-2" placeholder="ID Kategori" name="id_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="text" class="form-control mt-2" placeholder="Tahun" name="tahun_buku">
                                </div>
                                <div class="form-group">
                                    <label for="">ISBN</label>
                                    <input type="text" class="form-control mt-2" placeholder="Kode ISBN" name="isbn_buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Sinopsis</label>
                                    <input type="text" class="form-control mt-2" placeholder="Sinopsis Singkat" name="sinopsis">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Buku</label>
                                    <input type="text" class="form-control mt-2" placeholder="Jumlah Buku" name="jumlah">
                                </div>
                                <input type="submit"class="btn btn-primary mt-3" value="simpan">
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