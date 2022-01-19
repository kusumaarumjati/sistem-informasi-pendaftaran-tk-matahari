<?php
include 'koneksi.php';

$id_jenis = $_GET['id_jenis'];
$status = 1;

mysqli_query($koneksi, "update jenis_pembayaran set status='$status' where id_jenis='$id_jenis'");

header('location:index_jenis.php?pesan=sembunyikan data berhasil');
?>