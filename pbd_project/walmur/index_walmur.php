<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:../login/index_login.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>PROSES PENDAFTARAN TK</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

    <script type="text/javascript" src="js/jquery-3.2.1.js"> </script>
    <script type="text/javascript" src="js/bootstrap.js"> </script>
     <style type="text/css">
		.error {
			background-color: #1A5276;
			width: 1360px;
			height: auto;
			margin-top: 5px;
			padding: 10px;
			border-radius: 4px;
			color: #fff;

		}
	</style>

</head>
<body>
	<h2>Pendaftaran TK</h2>
	<br/>
	<a href="tambah_walmur.php" class="btn btn-dark" style="margin-left: 10px">+ Tambah Walmur </a>
	
	<a href="../login/home.php" class="btn btn-secondary" style="margin-left: 10px">Back To Home</a>
	<br/>
	<br/>
	<?php if(isset($_GET['pesan'])) { ?>
			<div class="error">
				<label><?php echo $_GET['pesan']; ?></label>
			</div>
		<?php } ?>
		<br>
	<table class="table table-hover">
		<tr>
			<th>NO</th>
			<th>NIK WALMUR</th>
			<th>NAMA WALI MURID</th>
			<th>PEKERJAAN</th>
			<th>OPSI</th>
		</tr>
		<?php
		$no = 1;
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from walimurid");
		while ($d = mysqli_fetch_array($data)) {
			if ($d['status'] == 0) {
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $d['nik_walmur']; ?></td>
			<td><?php echo $d['nama_walmur']; ?></td>
			<td><?php echo $d['pekerjaan_Walmur']; ?></td>
			<td>
				<a href="edit_walmur.php?nik_walmur=<?php echo $d['nik_walmur']; ?>" class="btn btn-primary">EDIT</a>
				<!-- <a href="hapus_walmur.php?nik_walmur=<?php echo $d['nik_walmur']; ?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">HAPUS</a> -->
					<a href="hide_walmur.php?nik_walmur=<?php echo $d['nik_walmur']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan?')" class="btn btn-danger">HAPUS</a>
			</td>
		</tr>

		<?php
		}	
		}
		?>
	</table>

</body>
</html>