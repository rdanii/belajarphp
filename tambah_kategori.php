<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
    <div class='container col-md-4 mt-4'>
        <h3>Tabel Kategori</h3>
        <div class='card'>
            <div class='card-header bg-primary text-white'>
                Tambah Kategori
            </div>
            <div class='card-body'>
                <form action="" method="post" role="form">
                    <div class='form-group'>
                        <label>Nama</label>
                        <input type="text" name='nama' class='form-control'>
                    </div>

                    <button type="submit" class='btn btn-success' name='submit'>Simpan</button>

            </div>


            </form>
            <?php
            include('koneksi.php');

            if (isset($_POST['submit'])) {

                $nama = $_POST['nama'];

                $data = mysqli_query($koneksi, "INSERT INTO tbl_kategori (kategori)values('$nama')")
                    or die(mysqli_error($koneksi));

            ?>
                <script>
                    window.location = 'index2.php';
                </script>
            <?php
            }
            ?>

        </div>
    </div>



</body>

</html>