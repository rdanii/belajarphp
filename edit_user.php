<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container col-md-6 mt-4">
        <h1>EDIT</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">EDIT USER</div>
            <div class="card-body">
                <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * from tbl_user where id = '$id'");
                $row = mysqli_fetch_assoc($data);
                ?>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>">
                        <input type="hidden" name="id" value="<?= $row ['id'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $row ['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $row ['password'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $row ['email'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('Anda yakin ingin mengubah ?')">Update</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $nama = $_POST['nama'];
                    $password = md5($_POST['password']);
                    $email = $_POST['email'];
                    mysqli_query($koneksi, "UPDATE tbl_user set username='$username', nama='$nama', `password`='$password', email='$email' where id = '$id'") or die(mysqli_error($koneksi));
                ?>
                    <script>
                        window.location = 'user.php'
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>