<?php
include 'koneksi.php';

$no_bayar = $_POST['no_bayar'];
$tgl_bayar = $_POST['tgl_bayar'];
$jml_byr = $_POST['jml_byr'];
$noinduk_siswa = $_POST['noinduk_siswa'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$tgl_daftar = $_POST['tgl_daftar'];
$status = $_POST['status'];

mysqli_query($koneksi,"insert into pembayaran values('$no_bayar','$tgl_bayar','$jml_byr','$noinduk_siswa','$jenis_pembayaran','$tgl_daftar','$status')");

//header("location:index_pembayaran.php?pesan=tambah data berhasil");
echo "<script>alert('Data berhasil disimpan');window.location='index_pembayaran.php'</script>";
?>