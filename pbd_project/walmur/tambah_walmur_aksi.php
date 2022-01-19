<?php
include 'koneksi.php';

$nik_walmur = $_POST['nik_walmur'];
$nama_walmur = $_POST['nama_walmur'];
$pekerjaan_Walmur = $_POST['pekerjaan_Walmur'];
$status = $_POST['status'];

mysqli_query($koneksi,"insert into walimurid values('$nik_walmur','$nama_walmur','$pekerjaan_Walmur','$status')");

// header("location:index_walmur.php?pesan=tambah data berhasil");
header("location:../siswa/index_siswa.php?pesan=tambah data berhasil");
//echo "<script>alert('Data berhasil disimpan');window.location='index_walmur.php'</script>";
?>