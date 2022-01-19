<?php
include 'koneksi.php';

$noinduk_siswa = $_POST['noinduk_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$jenkel = $_POST['jenkel'];
$tgllahir = $_POST['tgllahir'];
$tgl_masuk = $_POST['tgl_masuk'];
$tgl_lulus = $_POST['tgl_lulus'];
$alamat = $_POST['alamat'];
$anakke = $_POST['anakke'];
$walmur = $_POST['walmur'];
$status = $_POST['status'];
$status_siswa = $_POST['status_siswa'];


mysqli_query($koneksi,"insert into siswa values('$noinduk_siswa','$nama_siswa','$jenkel','$tgllahir','$tgl_masuk','$tgl_lulus','$alamat','$anakke','$walmur','$status','$status_siswa')");

header("location:index_siswa.php?pesan=tambah data berhasil");
?>