<?php
include 'koneksi.php';

$noinduk_siswa = $_GET['noinduk_siswa'];

mysqli_query($koneksi, "delete from siswa where noinduk_siswa='$noinduk_siswa'");

//header('location:index_siswa.php?pesan=hapus data berhasil');
echo "<script>alert('Data berhasil dihapus');window.location='index_siswa.php'</script>";
?>