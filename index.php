<h1>List Berita</h1>
<table border='1'>
  <tr>
    <th>NO</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Jumlah</th>
    <th>Status</th>
  </tr>
  <?php
  include 'koneksi.php';
  $berita = mysqli_query($koneksi, "SELECT * from tbl_berita");
  $no = 0;
  foreach ($berita as $row) {
    $no++;
    if ($row['jumlah'] > 7) {
      $status = 'Tidak lulus';
    } else {
      $status = 'Lulus';
    }
  ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $row['judul'] ?></td>
      <td><?php echo $row['isi'] ?></td>
      <td><?php echo $row['jumlah'] ?></td>
      <td><?php echo $status ?></td>
    </tr>
  <?php
  }
  ?>

</table>
<h2>List Barang</h2>
<table border="1">
  <tr>
    <th>NO</th>
    <th>Nama barang</th>
    <th>Merk</th>
    <th>Harga</th>
    <th>Kategori</th>
    <th>Jumlah</th>
    <th>Status Barang</th>
  </tr>
  <?php
  // $barang = mysqli_query($koneksi, 'SELECT * FROM tbl_barang');
  $barang = mysqli_query($koneksi, 'SELECT a.nama_barang as nama_barang, c.merk as merk, a.harga as harga, b.kategori as kategori, a.jumlah_barang as jumlah_barang
  From tbl_barang as a, tbl_kategori as b, tbl_merk as c
  WHERE a.kategori = b.id AND a.merk = c.id');

  $no = 0;
  foreach ($barang as $data) {
    $no++;
    if ($data['harga'] <= 1000) {
      $status = 'Murah';
    } else if ($data['harga'] <= 3000) {
      $status = 'Sedang';
    } else {
      $status = 'Mahal';
    }
  ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $data['nama_barang'] ?></td>
      <td><?php echo $data['merk'] ?></td>
      <td><?php echo $data['harga'] ?></td>
      <td><?php echo $data['kategori'] ?></td>
      <td><?php echo $data['jumlah_barang'] ?></td>
      <td><?php echo $status ?></td>
    </tr>
  <?php
  }
