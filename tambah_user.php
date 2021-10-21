<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Tambah User</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
  <div class='container col-md-4 mt-4'>
    <div class='card'>
      <div class='card-header bg-primary text-white'>
        Tambah User
      </div>
      <div class='card-body'>
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

          <button type="submit" class='btn btn-success' name='submit'>Simpan</button>

      </div>


      </form>
      <?php
      include('koneksi.php');

      if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "INSERT INTO tbl_user (username,nama,`password`)values('$username', '$nama', '$password')")
          or die(mysqli_error($koneksi));

      ?>
        <script>
          window.location = 'user.php';
        </script>
      <?php
      }
      ?>

    </div>
  </div>



</body>

</html>