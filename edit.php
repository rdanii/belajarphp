<!DOCTYPE html>
<html>

<head>
  <title>Ubah</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class="container col-md-6 mt-4">
    <h1>Table Barang</h1>
    <div class="card">
      <div class="card-header bg-success text-white ">
        Edit Barang
      </div>
      <div class="card-body">
        <?php
        include('koneksi.php');

        $id = $_GET['id']; //mengambil id barang yang ingin diubah

        //menampilkan barang berdasarkan id
        $data = mysqli_query($koneksi, "SELECT * from tbl_barang where id = '$id'");
        $row = mysqli_fetch_assoc($data);

        ?>
        <form action="" method="post" role="form">
          <div class="form-group">
            <label>Nama</label>
            <!--  menampilkan nama barang -->
            <input type="text" name="nama" required="" class="form-control" value="<?= $row['nama_barang']; ?>">

            <!-- ini digunakan untuk menampung id yang ingin diubah -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
          </div>

          <div class="form-group">
            <label>Jumlah</label>
            <input class="form-control" name="jumlah" value="<?php echo $row['jumlah_barang']; ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Anda yakin ingin mengubah ?')">Update Data</button>
        </form>

        <?php

        //jika klik tombol submit maka akan melakukan perubahan
        if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $nama = $_POST['nama'];
          $harga = $_POST['harga'];
          $jumlah = $_POST['jumlah'];

          //query mengubah barang
          mysqli_query($koneksi, "UPDATE tbl_barang set nama_barang='$nama', harga='$harga', jumlah_barang='$jumlah' where id ='$id'") or die(mysqli_error($koneksi)); ?>

          //redirect ke halaman index.php
          <script>
            alert('Data berhasil diupdate.');
            window.location = 'tbl_barang.php'
          </script>
        <?php } ?>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>