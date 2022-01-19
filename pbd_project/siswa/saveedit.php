<?php
include 'koneksi.php';
$noinduk_siswa =$_POST['noinduk_siswa'];
$nama_siswa =$_POST['nama_siswa'];
$jenkel =$_POST['jenkel'];
$tgllahir =$_POST['tgl_masuk'];
$tgl_masuk =$_POST['tgl_masuk'];
$tgl_lulus =$_POST['tgl_lulus'];
$alamat =$_POST['alamat'];
$anakke =$_POST['anakke'];
$status =$_POST['status'];
$status_siswa =$_POST['status_siswa'];

mysqli_query($koneksi,"UPDATE siswa set 
	nama_siswa='$nama_siswa',
	jenkel='$jenkel',
	tgllahir='$tgllahir',
	tgl_masuk='$tgl_masuk',
	tgl_lulus='$tgl_lulus',
	alamat='$alamat',
	anakke='$anakke',
	status='$status',
	status_siswa='$status_siswa'
	WHERE noinduk_siswa='$noinduk_siswa' ");
	
	echo "<script>alert('Data berhasil diubah');window.location='index_siswa.php'</script>";

?>