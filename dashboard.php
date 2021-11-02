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
              <h1 class="m-0">Management User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Management User</li>
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
                <div class="card-header bg-primary text-white">
                  <!-- DATA USER <a href="tambah_user.php" class="btn btn-sm btn-success float-right">Tambah</a> -->
                  <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#myModal">Tambah User</button>
                  <h5>Halo, <?php echo $_SESSION['username'] ?> Selamat Datang</h5>
                </div>
                <!-- init modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">

                        <form action="" method="post" role="form">
                          <div class='form-group'>
                            <label>Username</label>
                            <input type="text" name='username' class='form-control'>
                          </div>
                          <div class='form-group'>
                            <label>Nama Lengkap</label>
                            <input type="text" name='nama' class='form-control'>
                          </div>
                          <div class='form-group'>
                            <label>Password</label>
                            <input type="password" name='password' class='form-control'>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                          </div>

                          <button type="submit" class='btn btn-success' name='submit'>Simpan</button>

                      </div>


                      </form>
                      <?php
                      include('koneksi.php');

                      if (isset($_POST['submit'])) {

                        $username = $_POST['username'];
                        $nama = $_POST['nama'];
                        $password = md5($_POST['password']);
                        $email = $_POST['email'];

                        $data = mysqli_query($koneksi, "INSERT INTO tbl_user (username,nama,`password`,email)values('$username', '$nama', '$password', '$email') ")
                          or die(mysqli_error($koneksi));

                      ?>
                        <script>
                          window.location = 'dashboard.php';
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
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Password</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'koneksi.php';
                    $user = mysqli_query($koneksi, "SELECT * from tbl_user  ");
                    $no = 0;

                    foreach ($user as $data) {
                      $no++;

                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td>
                          <a href="edit_user.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                          <a href="hapus_user.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <br>
                <div class="col-md-3">
                  <a href="logout.php" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin logout?')">Logout</a>
                  <br>
                </div>
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
