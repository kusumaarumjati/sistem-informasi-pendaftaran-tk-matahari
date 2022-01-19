<?php
include 'koneksi.php';

$nik_walmur = $_GET['nik_walmur'];

mysqli_query($koneksi, "delete from walimurid where nik_walmur='$nik_walmur'");

//header('location:index_walmur.php?pesan=ubah data berhasil');
echo "<script>alert('Data berhasil dihapus');window.location='index_walmur.php'</script>";
?>