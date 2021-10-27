<?php
include 'koneksi.php'; //menghubungkan ke file koneksi untuk ke database
$id = $_GET['id']; //menampung id

//query hapus
$data = mysqli_query($koneksi, "DELETE from tbl_barang where id ='$id'") or die(mysqli_error($koneksi));

?>
//alert dan redirect ke index.php
<script>
    alert('data berhasil dihapus.');
    window.location = 'tbl_barang.php';
</script>