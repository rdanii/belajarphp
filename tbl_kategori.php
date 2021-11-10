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
          <h1 class="m-0 ml-5">Daftar Kategori</h1>
        </div><!-- /.col -->
        <div class="col-md-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
            <div class="card-header bg-secondary text-white">
              DATA KATEGORI
              <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#myModal">Tambah Kategori</button>
            </div>

            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title float-left">Tambah Kategori</h4>
                  </div>

                  <div class="modal-body">

                    <form action="" method="post" role="form">
                      <div class='form-group'>
                        <label>Nama</label>
                        <input type="text" name='nama' class='form-control'>
                      </div>

                      <button type="submit" class='btn btn-success' name='submit'>Simpan</button>

                    </form>

                    <?php
                    include('koneksi.php');

                    if (isset($_POST['submit'])) {

                      $nama = $_POST['nama'];

                      $data = mysqli_query($koneksi, "INSERT INTO tbl_kategori (kategori)values('$nama')")
                        or die(mysqli_error($koneksi));

                    ?>
                      <script>
                        window.location = 'tbl_kategori.php';
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
                            <h4 class="modal-title float-left">Ubah Kategori</h4>
                          </div>
                          <div class="modal-body">

                            <form action="" method="post" role="form">
                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="kategori" class="form-control" value="<?php echo $data['kategori'] ?>">
                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                              </div>
                              <button type="submit" class="btn btn-success" name="submit2" onclick="return confirm('Anda yakin ingin mengubah ?')">Update</button>
                            </form>
                            <?php
                            if (isset($_POST['submit2'])) {
                              $id = $_POST['id'];
                              $nama = $_POST['kategori'];
                              mysqli_query($koneksi, "UPDATE tbl_kategori set kategori='$nama' where id = '$id'") or die(mysqli_error($koneksi));
                            ?>

                              <script>
                                window.location = 'tbl_kategori.php'
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
                            <h4 class="modal-title float-left"> Yakin hapus Data <?php echo $data['kategori'] ?> ?</h4>
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
                              mysqli_query($koneksi, "DELETE from tbl_kategori where id ='$id'") or die(mysqli_error($koneksi)); ?>

                              <script>
                                alert('Data berhasil dihapus.');
                                window.location = 'tbl_kategori.php'
                              </script>
                            <?php } ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>

                    </div>



                  <?php } ?>

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
