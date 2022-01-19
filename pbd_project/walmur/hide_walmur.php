<?php
include 'koneksi.php';

$nik_walmur = $_GET['nik_walmur'];
$status = 1;

mysqli_query($koneksi, "update walimurid set status='$status' where nik_walmur='$nik_walmur'");

header('location:index_walmur.php?pesan=sembunyikan data berhasil');
?>