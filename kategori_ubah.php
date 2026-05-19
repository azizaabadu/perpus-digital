<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Ubah Kategori</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <?php
                   $id = $_GET['id'];

                   $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
                   $data = mysqli_fetch_array($query);

                   if(isset($_POST['submit'])) {
                    $kategori = strtolower($_POST['kategori']);
                    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE  LOWER(kategori)='$kategori'");
                    $check = mysqli_num_rows($cek);
                    if ($check > 0 ) {
                        echo"DATA YANG DIMASUKAN SAMA";
                    }else{
                       $query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori=$id");
                            if($query) {
                                echo '<script>alert("Ubah data berhasil");</script>';
                            } else {
                                echo '<script>alert("Ubah data gagal");</script>';
                            } 
                    }
                   }
                ?>
                <div class="mb-3">
                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control"  name="kategori" value=<?php echo $data['kategori']; ?> required>
                </div>

                <!-- button Area -->
                 <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">
                            simpan
                        </button>
                        <button type="submit" class="btn btn-secondary">
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
