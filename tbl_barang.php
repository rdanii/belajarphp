<?php
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Management Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Management Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success text-white">
              DATA BARANG
              <!-- <a href="tambah.php" class="btn btn-sm btn-primary float-right">Tambah</a> -->
              <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#myModal">Tambah Barang</button>

            </div>
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title float-left">Tambah Barang</h4>
                  </div>
                  <div class="modal-body">

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
                      <script>
                        alert('data berhasil disimpan.')
                        window.location = 'tbl_barang.php'
                      </script>
                    <?php
                    }
                    ?>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>

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
                        <a data-toggle="modal" data-target="#myModaledit<?php echo $data['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a data-toggle="modal" data-target="#myModalhapus<?php echo $data['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <div class="modal fade" id="myModaledit<?php echo $data['id'] ?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title float-left">Ubah Barang</h4>
                          </div>
                          <div class="modal-body">

                            <form action="" method="post" role="form">
                              <div class="form-group">
                                <label>Nama</label>
                                <!--  menampilkan nama barang -->
                                <input type="text" name="nama" required="" class="form-control" value="<?= $data['nama_barang']; ?>">

                                <!-- ini digunakan untuk menampung id yang ingin diubah -->
                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" name="jumlah" value="<?php echo $data['jumlah_barang']; ?>">
                              </div>
                              <button type="submit" class="btn btn-primary" name="submit2" onclick="return confirm('Anda yakin ingin mengubah ?')">Update Data</button>
                            </form>
                            <?php
                            include('koneksi.php');

                            //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                            if (isset($_POST['submit2'])) {
                              $id = $_POST['id'];
                              $nama = $_POST['nama'];
                              $harga = $_POST['harga'];
                              $jumlah = $_POST['jumlah'];

                              //query mengubah barang
                              mysqli_query($koneksi, "UPDATE tbl_barang set nama_barang='$nama', harga='$harga', jumlah_barang='$jumlah' where id ='$id'") or die(mysqli_error($koneksi)); ?>

                              <script>
                                alert('Data berhasil diupdate.');
                                window.location = 'tbl_barang.php'
                              </script>
                            <?php } ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="modal fade" id="myModalhapus<?php echo $data['id'] ?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title float-left"> Yakin hapus Data <?php echo $data['nama_barang'] ?> ?</h4>
                          </div>
                          <div class="modal-body">

                            <form action="" method="post" role="form">
                              <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                              <button type="submit" class="btn btn-primary" name="submitHapus">Ya</button>
                            </form>
                            <?php
                            include('koneksi.php');

                            //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                            if (isset($_POST['submitHapus'])) {
                              $id = $_POST['id'];

                              //query hapus barang
                              mysqli_query($koneksi, "DELETE from tbl_barang where id ='$id'") or die(mysqli_error($koneksi)); ?>

                              <script>
                                alert('Data berhasil dihapus.');
                                window.location = 'tbl_barang.php'
                              </script>
                            <?php } ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';
