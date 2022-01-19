<?php
include 'koneksi.php';

$id_jenis = $_GET['id_jenis'];

mysqli_query($koneksi, "delete from jenis_pembayaran where id_jenis='$id_jenis'");

//header('location:index_jenis.php?pesan=hapus data berhasil');
echo "<script>alert('Data berhasil dihapus');window.location='index_jenis.php'</script>";
?>