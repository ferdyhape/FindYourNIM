<?php
session_start();

$nim_nama = $_POST["nim-nama"];
$result = shell_exec('curl -k "https://siakad.polinema.ac.id/ajax/ms_mhs/cari_mhs?q=' . urlencode($nim_nama) . '"');

$_SESSION['finalresult'] = $result;


header('location: result.php');
