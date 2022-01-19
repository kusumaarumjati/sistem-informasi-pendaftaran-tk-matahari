<?php
include 'koneksi.php';

$noinduk_siswa = $_GET['noinduk_siswa'];
$status = 1;

mysqli_query($koneksi, "update siswa set status='$status' where noinduk_siswa='$noinduk_siswa'");

header('location:index_siswa.php?pesan=sembunyikan data berhasil');
?>