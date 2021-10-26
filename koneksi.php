<?php
// konfigurasi database
$host       =   "localhost:3308";
$user       =   "root";
$password   =   "";
$database   =   "belajar";
// perintah php untuk akses ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
  die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
