<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tambah Merk</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
    <div class="container col-md-4 mt-4">
        <h3>Tabel Merk</h3>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tambah Merk
            </div>
            <div class="card-body">
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>


                </form>
            </div>
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
    </div>

</body>

</html>