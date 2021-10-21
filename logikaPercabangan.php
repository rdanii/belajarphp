<?php

$nilai = 60;

echo 'Memeriksa variable $nilai <br>';
echo "Nilai: $nilai <br>";

if ($nilai >= 70) {
  echo "Selamat, siswa !";
} else {
  echo "Mohon maaf, siswa tidak lulus";
}

echo "<br>";


$nilai = 75;

echo 'Memeriksa variable $nilai <br>';
echo "Nilai: {$nilai} <br>";

if ($nilai >= 85) {
  echo "Sangat mengesankan!";
} elseif ($nilai >= 70) {
  echo "Selamat anda lulus!";
} else {
  echo "Jangan menyerah, anda pasti bisa!";
}

echo "<br>";


$nilai = 72;

echo $nilai > 70 ? "Selamat, anda lulus!" : "Mohon maaf, anda harus mengulang";