<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 ml-5">Daftar Merk</h1>
        </div><!-- /.col -->
        <div class="col-md-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Merk</li>
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
            <div class="card-header bg-primary text-white">DATA MERK
              <button type="button" class="btn btn-sm btn-dark float-right" data-toggle="modal" data-target="#myModal">Tambah Merk</button>
            </div>

            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title float-left">Tambah Merk</h4>
                  </div>

                  <div class="modal-body">

                    <form action="" method="post" role="form">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-success" name="submit">Simpan</button>


                    </form>

                    <?php
                    include 'koneksi.php';
                    if (isset($_POST['submit'])) {
                      $nama = $_POST['nama'];
                      $data = mysqli_query($koneksi, "INSERT Into tbl_merk(merk)values('$nama')") or die(mysqli_error($koneksi));
                    ?>
                      <script>
                        window.location = 'tbl_merk.php'
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
                    <th width='10%'>No</th>
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
                      <td>
                        <a data-toggle="modal" data-target="#myModaledit<?php echo $mrk['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a data-toggle="modal" data-target="#myModalhapus<?php echo $mrk['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </tr>

                    <div class="modal fade" id="myModaledit<?php echo $mrk['id'] ?>" role="dialog">
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
                                <label>Nama Merk</label>
                                <input type="text" name="merk" class="form-control" value="<?php echo $mrk['merk'] ?>">
                                <input type="hidden" name='id' value="<?php echo $mrk['id'] ?>">
                              </div>
                              <button type="submit" name="submit2" class="btn btn-success" onclick="return confirm('Anda yakin ingin mengubah ?')">Update</button>
                            </form>
                            <?php
                            include('koneksi.php');

                            //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                            if (isset($_POST['submit2'])) {
                              $id = $_POST['id'];
                              $nama = $_POST['merk'];
                              mysqli_query($koneksi, "UPDATE tbl_merk set merk = '$nama' where id = '$id'") or die(mysqli_error($koneksi));
                            ?>
                              <script>
                                window.location = 'tbl_merk.php'
                              </script>
                            <?php } ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="modal fade" id="myModalhapus<?php echo $mrk['id'] ?>" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title float-left"> Yakin hapus Data <?php echo $mrk['merk'] ?> ?</h4>
                          </div>
                          <div class="modal-body">

                            <form action="" method="post" role="form">
                              <input type="hidden" name="id" value="<?php echo $mrk['id'] ?>">
                              <button type="submit" class="btn btn-primary" name="submitHapus">Ya</button>
                            </form>
                            <?php
                            include('koneksi.php');

                            //melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
                            if (isset($_POST['submitHapus'])) {
                              $id = $_POST['id'];

                              //query hapus barang
                              mysqli_query($koneksi, "DELETE from tbl_merk where id ='$id'") or die(mysqli_error($koneksi)); ?>

                              <script>
                                alert('Data berhasil dihapus.');
                                window.location = 'tbl_merk.php'
                              </script>
                            <?php } ?>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>

                    </div>


                  <?php }
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
