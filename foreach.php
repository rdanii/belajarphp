<?php

$listMahasiswa = ['Nurul Huda', 'Wahid Abdullah', 'Elmo Bachtiar', 'Anton', 'Andi', 'Rifki', 'Syuhada', 'Gino', 'Alex', 'Yohan'];

foreach ($listMahasiswa as $mahasiswa) {
  echo "Nama : {$mahasiswa} <br>";

}

for ($a=0; $a< count($listMahasiswa); $a++) {
  echo "Nama : {$listMahasiswa[$a]}<br>";  
}

