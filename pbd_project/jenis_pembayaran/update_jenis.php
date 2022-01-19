<?php
include 'koneksi.php';

$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];
$status = $_POST['status'];

mysqli_query($koneksi,"update jenis_pembayaran set nama_jenis='$nama_jenis', status='$status' where id_jenis='$id_jenis'");

// header("location:index_jenis.php?pesan=ubah data berhasil");
echo "<script>alert('Data berhasil diubah');window.location='index_jenis.php'</script>";
?>