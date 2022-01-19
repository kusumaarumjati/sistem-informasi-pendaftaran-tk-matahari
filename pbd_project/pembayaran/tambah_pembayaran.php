<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa</title>
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
</head>
<body>
	<h2>Pembayaran Siswa</h2>
	<br/>
	<form method="post" action="tambah_pembayaran_aksi.php">
		<table>
			<tr>
				<td>No Bayar :  </td>
				<td><input type="text" name="no_bayar">
					<input type="hidden" name="status" value="0">
				</td>
			</tr>
			<tr>
				<td>Tanggal Bayar : </td>
				<td><input type="date" name="tgl_bayar"></td>
			</tr>
			<tr>
				<td>Jumlah Bayar: </td>
				<td><input type="number" name="jml_byr"></td>
			</tr>
			<!-- <tr>
				<td>TNo Induk Siswa : </td>
				<td><input type="text" name="noinduk_siswa"></td>
			</tr> -->
			<tr>
				<td>No Induk Siswa : </td>
				<!-- <td><input type="text" name="walmur"></td> -->
				<td>
				<select name="noinduk_siswa" required>
					<option value="">Pilih Siswa</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM siswa ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						echo "<option value='$hasil_kat[noinduk_siswa]'> $hasil_kat[nama_siswa] </option>";
					}
					?>
				</select>
			</td>
			</tr>
			<!-- <tr>
				<td>Jenis Pembayaran : </td>
				<td><input type="text" name="jenis_pembayaran"></td>
			</tr> -->
			<tr>
				<td>Jenis Pembayaran : </td>
				<!-- <td><input type="text" name="walmur"></td> -->
				<td>
				<select name="jenis_pembayaran" required>
					<option value="">Pilih Jenis Pembayaran</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM jenis_pembayaran ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						echo "<option value='$hasil_kat[id_jenis]'> $hasil_kat[nama_jenis] </option>";
					}
					?>
				</select>
			</td>
			</tr>
			<tr>
				<td>Tanggal Daftar : </td>
				<td><input type="date" name="tgl_daftar"></td>
			</tr>
			<tr>
				<td><input type="submit" value="SIMPAN" class="btn btn-success">
					<a href="index_pembayaran.php" class="btn btn-dark"> Kembali </a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>