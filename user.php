<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
  <script>
    alert('Anda belum login.')
    window.location = 'login.php'
  </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>
  <div class="container col-md-8 mt-4">
    <h1>User Management</h1>
    <div class="card">
      <div class="card-header bg-success text-white">
        DATA USER <a href="tambah_user.php" class="btn btn-sm btn-primary float-right">Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama</th>
              <th>Password</th>
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
    <a href="logout.php" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin logout?')">Logout</a>
  </div>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>