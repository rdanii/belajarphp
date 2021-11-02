<?php
include 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 ml-5">Daftar Kategori</h1>
        </div><!-- /.col -->
        <div class="col-md-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
            <div class="card-header bg-secondary text-white">
              DATA KATEGORI <a href="tambah_kategori.php" class="btn btn-sm btn-primary float-right">Tambah</a>
            </div>

            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'koneksi.php';
                  // $barang = mysqli_query($koneksi, "SELECT a.nama_barang as nama_barang, c.merk as merk, a.harga as harga, b.kategori as kategori, a.jumlah_barang as jumlah_barang 
                  // FROM tbl_barang as a, tbl_kategori as b, tbl_merk as c  
                  // WHERE a.kategori = b.id 
                  // AND a.merk = c.id
                  // ");
                  $kategori = mysqli_query($koneksi, "SELECT * from tbl_kategori");
                  $no = 0;

                  foreach ($kategori as $data) {
                    $no++;

                    'tbl_kategori';
                  ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $data['kategori'] ?></td>
                      <td> <a href="edit_kategori.php?id=<?php echo $data['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="hapus_kategori.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus?')">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>

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
