<!DOCTYPE html>
<html>

<head>
  <title>Ubah</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class="container col-md-6 mt-4">
    <h1>Table Stok</h1>
    <div class="card">
      <div class="card-header bg-success text-white ">
        Edit Stok
      </div>
      <div class="card-body">
        <?php
        include('koneksi.php');

        $id = $_GET['id']; //mengambil id barang yang ingin diubah

        //menampilkan barang berdasarkan id
        $data = mysqli_query($koneksi, "SELECT * from tbl_stok where id = '$id'");
        $row = mysqli_fetch_assoc($data);

        ?>
        <form action="" method="post" role="form">
          <div class="form-group">
            <label>Nama</label>
            <!--  menampilkan nama barang -->
            <input type="text" name="nama_barang" required="" class="form-control" value="<?= $row['nama_barang']; ?>">

            <!-- ini digunakan untuk menampung id yang ingin diubah -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="text" name="jumlah_barang" class="form-control" value="<?php echo $row['jumlah_barang']; ?>">
          </div>

          <div class="form-group">
            <label>Merk</label>
            <input class="form-control" name="merk" value="<?php echo $row['merk']; ?>">
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <input class="form-control" name="jenis" value="<?php echo $row['jenis']; ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Anda yakin ingin mengubah ?')">Update Data</button>
        </form>

        <?php

        //jika klik tombol submit maka akan melakukan perubahan
        if (isset($_POST['submit'])) {
          $id = $_POST['id'];
          $nama = $_POST['nama_barang'];
          $jumlah = $_POST['jumlah_barang'];
          $merk = $_POST['merk'];
          $jenis = $_POST['jenis'];

          //query mengubah barang
          mysqli_query($koneksi, "UPDATE tbl_stok set nama_barang='$nama', jumlah_barang='$jumlah', merk = '$merk', jenis = '$jenis' where id ='$id'") or die(mysqli_error($koneksi)); ?>

          //redirect ke halaman index.php
          <script>
            alert('Data berhasil diupdate.');
            window.location = 'tbl_stok.php'
          </script>
        <?php } ?>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>