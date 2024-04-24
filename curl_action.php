<?php
$nim_nama = $_POST["nim-nama"];

// Execute curl command to fetch data
$result = shell_exec('curl -k "https://siakad.polinema.ac.id/ajax/ms_mhs/cari_mhs?q=' . urlencode($nim_nama) . '"');

// Output the result
echo $result;
