<!DOCTYPE html>
<html>

<head>
  <title>TABEL</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class="container col-md-8 mt-4">
    <h1>Tabel Barang</h1>
    <div class="card">
      <div class="card-header bg-success text-white">
        DATA BARANG <a href="tambah.php" class="btn btn-sm btn-primary float-right">Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Merk</th>
              <th>Harga</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            $barang = mysqli_query($koneksi, "SELECT * from tbl_barang  ");
            $no = 0;

            foreach ($barang as $data) {
              $no++;
              if ($data['harga'] <= 1000) {
                $harga = "Murah";
              } else {
                $harga = "Murah";
              }

            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
                <td><?php echo $data['merk'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><?php echo $data['kategori'] ?></td>
                <td><?php echo $data['jumlah_barang'] ?></td>
                <td><?php echo $harga ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?')">Hapus</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container col-md-4 mt-4">
    <h1>Tabel Kategori</h1>
    <div class="card">
      <div class="card-header bg-secondary text-white">
        DATA KATEGORI <a href="tambah_kategori.php" class="btn btn-sm btn-primary float-right">Tambah</a>
      </div>

      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            // $barang = mysqli_query($koneksi, "SELECT a.nama_barang as nama_barang, c.merk as merk, a.harga as harga, b.kategori as kategori, a.jumlah_barang as jumlah_barang 
            // FROM tbl_barang as a, tbl_kategori as b, tbl_merk as c  
            // WHERE a.kategori = b.id 
            // AND a.merk = c.id
            // ");
            $kategori = mysqli_query($koneksi, "SELECT * from tbl_kategori");
            $no = 0;

            foreach ($kategori as $data) {
              $no++;

              'tbl_kategori';
            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['kategori'] ?></td>
                <td> <a href="edit_kategori.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="hapus_kategori.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="container col-md-4 mt-4 mb-2">
    <h1>Tabel Merk</h1>
    <div class="card">
      <div class="card-header bg-primary text-white">DATA MERK <a href="tambah_merk.php" class="btn btn-sm btn-success float-right">Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Merk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'koneksi.php';
            $merk = mysqli_query($koneksi, 'SELECT * From tbl_merk');
            $no = 0;
            foreach ($merk as $mrk) {
              'tbl_merk';
              $no++;

            ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $mrk['merk'] ?></td>
                <td> <a href="edit_merk.php?id=<?php echo $mrk['id'] ?>" class="btn btn-sm btn-warning">Edit</a> <a href="hapus_merk.php?id=<?php echo $mrk['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus ?')">Hapus</a></td>
              </tr>

            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <br>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>