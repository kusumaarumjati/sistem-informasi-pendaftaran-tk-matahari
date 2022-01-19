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

	<h2>Pembayaran</h2>
	<br/>
	<a href="tambah_pembayaran.php" class="btn btn-dark" style="margin-left: 10px">+ Tambah Pembayaran </a>
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
			<th>NO BAYAR</th>
			<th>TGL BAYAR</th>
			<th>JUMLAH BAYAR</th>
			<th>NOINDUK SISWA</th>
			<th>JENIS PEMBAYARAN</th>
			<th>Tanggal Daftar</th>
			<th>AKSI</th>
		</tr>
		<?php
		$no = 1;
		include 'koneksi.php';
		$query = "SELECT pm.no_bayar, pm.tgl_bayar, pm.jml_byr, pm.noinduk_siswa, pm.jenis_pembayaran, pm.tgl_daftar, pm.status FROM pembayaran pm 
			JOIN siswa si ON pm.noinduk_siswa = si.noinduk_siswa
			JOIN jenis_pembayaran jp ON pm.jenis_pembayaran = jp.id_jenis";
		//$query = "SELECT * FROM pembayaran";
		$data = mysqli_query($koneksi, $query);
		while ($d = mysqli_fetch_array($data)) {
			if ($d['status'] == 0) {
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $d['no_bayar']; ?></td>
			<td><?php echo $d['tgl_bayar']; ?></td>
			<td><?php echo $d['jml_byr']; ?></td>
			<?php
				$datasiswa=mysqli_query($koneksi, "SELECT * FROM siswa where noinduk_siswa='$d[noinduk_siswa]'");
				$d2 = mysqli_fetch_array($datasiswa);
			?>
			<td><?php echo $d2['nama_siswa']; ?></td>
			<?php
				$datajenis=mysqli_query($koneksi, "SELECT * FROM jenis_pembayaran where id_jenis='$d[jenis_pembayaran]'");
				$d2 = mysqli_fetch_array($datajenis);
			?>
			<td><?php echo $d2['nama_jenis']; ?></td>
			<td><?php echo $d['tgl_daftar']; ?></td>
			<td>
				<a href="edit_pembayaran.php?no_bayar=<?php echo $d['no_bayar']; ?>" class="btn btn-primary">EDIT</a>
				<!-- <a href="hapus_pembayaran.php?no_bayar=<?php echo $d['no_bayar']; ?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">HAPUS</a> -->
				<a href="hide_pmbyrn.php?no_bayar=<?php echo $d['no_bayar']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan?')" class="btn btn-danger">HAPUS</a>
			</td>

		</tr>
		<?php	
		}
	}
		?>
	</table>

</body>
</html>