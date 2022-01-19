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


mysqli_query($koneksi,"update siswa set nama_siswa='$nama_siswa',jenkel='$jenkel', tgllahir='$tgllahir', tgl_masuk='$tgl_masuk', tgl_lulus='$tgl_lulus', alamat='$alamat', anakke='$anakke', walmur='$walmur', status='$status', status_siswa='$status_siswa' where noinduk_siswa='$noinduk_siswa'");

// header("location:index_siswa.php?pesan=ubah data berhasil");
echo "<script>alert('Data berhasil diubah');window.location='index_siswa.php'</script>";

// 	echo "<script>alert('Data gagal diubah');window.location='index_siswa.php'</script>";
// }
?>