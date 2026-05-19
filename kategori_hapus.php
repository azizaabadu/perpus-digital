<?php
if (isset($_GET['id'])) {

    $id = (int) $_GET['id']; // paksa jadi angka

    $query = mysqli_query($koneksi, 
    "DELETE FROM kategori WHERE id_kategori=$id");

    if ($query) {
        echo "<script>
                alert('Data kategori berhasil dihapus');
                window.location.href='?page=kategori';
              </script>";
    } else {
        echo "<script>
                alert('Data kategori gagal dihapus');
                window.location.href='?page=kategori';
              </script>";
    }

} else {
    echo "<script>
            alert('ID kategori tidak ditemukan');
            window.location.href='?page=kategori';
          </script>";
}
?>