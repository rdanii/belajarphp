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
        <div class="col-md-8 ml-5">
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
                      <td> <a href="edit_merk.php?id=<?php echo $mrk['id'] ?>" class="btn btn-sm btn-warning">Edit</a> <a href="hapus_merk.php?id=<?php echo $mrk['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus ?')">Hapus</a></td>
                    </tr>

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
