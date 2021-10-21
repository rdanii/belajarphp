<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabek Merk</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container col-md-6 mt-4">
        <h1>Tabel Merk</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">EDIT MERK</div>
            <div class="card-body">
                <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * from tbl_merk where id = '$id'");
                $row = mysqli_fetch_assoc($data);
                ?>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Nama Merk</label>
                        <input type="text" name="merk" class="form-control" value="<?php echo $row['merk'] ?>">
                        <input type="hidden" name='id' value="<?php echo $row['id'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $nama = $_POST['merk'];
                    mysqli_query($koneksi, "UPDATE tbl_merk set merk = '$nama' where id = '$id'") or die(mysqli_error($koneksi));
                ?>
                    <script>
                        window.location = 'index2.php'
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>