<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "DELETE from tbl_stok where id = '$id'") or die(mysqli_error($koneksi));
?>
<script>
    window.location = 'tbl_stok.php'
</script>