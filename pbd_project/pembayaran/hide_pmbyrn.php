<?php
include 'koneksi.php';

$no_bayar = $_GET['no_bayar'];
$status = 1;

mysqli_query($koneksi, "update pembayaran set status='$status' where no_bayar='$no_bayar'");

header('location:index_pembayaran.php?pesan=sembunyikan data berhasil');
?>