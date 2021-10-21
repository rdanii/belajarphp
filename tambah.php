<!DOCTYPE html>
<html>

<head>
  <title>Tambah Barang</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class="container col-md-6 mt-4">
    <h1>Table Barang</h1>
    <div class="card">
      <div class="card-header bg-success text-white">
        Tambah Barang
      </div>
      <div class="card-body">
        <form action="" method="post" role="form">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
          </div>

          <div class="form-group">
            <label>Jumlah Barang</label>
            <input class="form-control" name="jumlah">
          </div>

          <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
        </form>

        <?php
        include('koneksi.php');

        //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
        if (isset($_POST['submit'])) {
          //menampung data dari inputan
          $nama = $_POST['nama'];
          $harga = $_POST['harga'];
          $jumlah = $_POST['jumlah'];

          //query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
          $data = mysqli_query($koneksi, "INSERT into tbl_barang (nama_barang,harga,jumlah_barang)values('$nama', '$harga', '$jumlah')") or die(mysqli_error($koneksi));
          //id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

          //ini untuk menampilkan alert berhasil dan redirect ke halaman index
          ?>
          <script>alert('data berhasil disimpan.')
          window.location='index2.php'</script>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>