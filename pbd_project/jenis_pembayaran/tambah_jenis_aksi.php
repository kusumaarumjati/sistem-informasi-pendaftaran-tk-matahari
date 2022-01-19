<?php
include 'koneksi.php';

$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];
$status = $_POST['status'];
mysqli_query($koneksi,"insert into jenis_pembayaran values('$id_jenis','$nama_jenis','$status')");

//header("location:index_jenis.php?pesan=tambah data berhasil");
echo "<script>alert('Data berhasil disimpan');window.location='index_jenis.php'</script>";
?>