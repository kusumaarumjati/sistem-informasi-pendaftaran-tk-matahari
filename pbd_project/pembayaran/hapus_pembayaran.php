<?php
include 'koneksi.php';

$no_bayar = $_GET['no_bayar'];

mysqli_query($koneksi, "delete from pembayaran where no_bayar='$no_bayar'");

//header('location:index_pembayaran.php?pesan=hapus data berhasil');
echo "<script>alert('Data berhasil dihapus');window.location='index_pembayaran.php'</script>";
?>