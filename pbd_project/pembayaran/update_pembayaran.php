<?php
include 'koneksi.php';

$no_bayar = $_POST['no_bayar'];
$tgl_bayar = $_POST['tgl_bayar'];
$jml_byr = $_POST['jml_byr'];
$noinduk_siswa = $_POST['noinduk_siswa'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$tgl_daftar = $_POST['tgl_daftar'];
$status = $_POST['status'];

mysqli_query($koneksi,"update pembayaran set tgl_bayar='$tgl_bayar',jml_byr='$jml_byr', noinduk_siswa='$noinduk_siswa', jenis_pembayaran='$jenis_pembayaran', tgl_daftar='$tgl_daftar', status='$status' where no_bayar='$no_bayar'");

//header("location:index_pembayaran.php?pesan=ubah data berhasil");
echo "<script>alert('Data berhasil diubah');window.location='index_pembayaran.php'</script>";
?>