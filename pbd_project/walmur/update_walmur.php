<?php
include 'koneksi.php';

$nik_walmur = $_POST['nik_walmur'];
$nama_walmur = $_POST['nama_walmur'];
$pekerjaan_Walmur = $_POST['pekerjaan_Walmur'];
$status = $_POST['status'];

mysqli_query($koneksi,"update walimurid set nama_walmur='$nama_walmur', pekerjaan_Walmur='$pekerjaan_Walmur', status='$status' where nik_walmur='$nik_walmur'");

//header("location:index_walmur.php?pesan=ubah data berhasil");
echo "<script>alert('Data berhasil diubah');window.location='index_walmur.php'</script>";
?>