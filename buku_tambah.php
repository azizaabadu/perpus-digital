<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Tambah Buku</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <?php
                    if(isset($_POST['submit'])){
                        $buku = strtolower($_POST['buku']);
                        
                        $cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE  LOWER(buku)='$buku'");
                        $check = mysqli_num_rows($cek);
                        if($check >  0) {
                            echo "Data yang dimasukan sama";
                        } else {
                            $query = mysqli_query($koneksi, "INSERT INTO buku(judul, kategori, gambar, penulis, penerbit, tahun_terbit, isbn, jumlah, sinposis) VALUES ('$kategori')");
                            if($query) {
                                echo '<script>alert("Tambah data berhasil");</script>';
                            } else {
                                echo '<script>alert("Tambah data gagal");</script>';
                            }
                        }
                    }
                ?>
                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control"  name="kategori" placeholder="Masukan Nama Kategori"  required>
                </div>

                <!-- button Area -->
                 <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">
                            simpan
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            reset
                        </button>
                        <a href="?page=kategori" class="btn btn-danger">
                            Kembali
                        </a>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
