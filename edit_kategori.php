<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ubah Kategori</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
    <div class="container col-md-4 mt-4">
        <h1>Tabel kategori</h1>
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Edit kategori
            </div>
            <div class="card-body">
                <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * from tbl_kategori where id = '$id'");
                $row = mysqli_fetch_assoc($data);
                ?>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="kategori" class="form-control" value="<?php echo $row['kategori'] ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Update Data</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $nama = $_POST['kategori'];
                    mysqli_query($koneksi, "UPDATE tbl_kategori set kategori='$nama' where id = '$id'") or die(mysqli_error($koneksi));
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