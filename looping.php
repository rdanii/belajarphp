<?php

for ($x = 10; $x > 1; $x--) {
  echo "Nilai x = {$x} <br>";
}


$listMahasiswa = ['Andi', 'Wahid', 'Elmo'];

for ($i = 0; $i < count($listMahasiswa); $i++) {
  echo "Nama: {$listMahasiswa[$i]} <br>";
}



for ($i = 1; $i <= 50; $i++) {
  if ($i % 10 === 0) {
    continue; # skip perulangan jika nilai $i habis dibagi 10
  }

  echo "Perulangan ke-{$i} <br>";

  if ($i > 40) {
    break; # hentikan perulangan jika $i lebih dari 20
  }
}



$i = 0;

# perulangan ini akan dilakukan selama nilai $i kurang dari 20.
while ($i < 20) {
  echo "Perulangan ke-{$i} <br>";

  $i++;
}