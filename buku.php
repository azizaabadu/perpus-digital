
<div class="w-100">
    <h1 class="mt-4">Daftar buku</h1>

    <!-- buton add data -->
     <div class="mb-3 clearfix" >
        <a href="?page=buku_tambah" class="btn btn-primary">Tambah Daftar Buku</a>
     </div>
    <div>
        <div class="card-body">
            <form action="" method="get">
                <input type="hidden" name="page" value="buku">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="nama_buku" id="nama_buku" class="form-control" placeholder="Nama Buku"
                        value="<?php echo isset ($_GET['nama_buku'])? htmlspecialchars($_GET['nama_buku']) : '';?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Tahun Terbit"
                        value="<?php echo isset ($_GET['tahun_terbit'])? htmlspecialchars($_GET['tahun_terbit']) : '';?>">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis"
                        value="<?php echo isset ($_GET['penulis'])? htmlspecialchars($_GET['penulis']) : '';?>">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Nama Kategori</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <th>penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>ISBN</th>
                    <th>Jumlah</th>
                    <th>Sinposis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        
            <tbody>
                <?php
                // tampilkan data kategori dari database
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT buku.*, kategori.kategori AS kategori 
                                                FROM buku 
                                                LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori 
                                                WHERE 1=1");
                while($data = mysqli_fetch_array($query)) :
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['judul']; ?></td>
                    <td><?= $data['kategori']; ?></td>
                    <td>
                        <?php if ($data['gambar'] != ""): ?>
                        <img src="assets/img/<?= $data['gambar']; ?>" width="65" alt="Cover">
                        <?php else: ?>
                            <small class="text-muted">Tidak ada gambar</small>
                        <?php endif; ?>
                    </td>
                    <td><?= $data['penulis']; ?></td>
                    <td><?= $data['penerbit']; ?></td>
                    <td><?= $data['tahun_terbit']; ?></td>
                    <td><?= $data['isbn']; ?></td>
                    <td><?= $data['jumlah']; ?></td>
                    <td><?= $data['sinopsis']; ?></td>
                    <td>
                        <a href="?page=buku_detail&id=<?= $data['id_buku'] ?>" class="btn btn-sm btn-primary">Detail</a>
                        <a href="?page=buku_ubah&id=<?= $data['id_buku'] ?>" class="btn btn-sm btn-info">ubah</a>
                        <a href="?page=buku_hapus&id=<?= $data['id_buku'] ?>" class="btn btn-sm btn-danger">hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>