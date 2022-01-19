<!DOCTYPE html>
<html>
<head>
	<title>Edit siswa</title>
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
	<h2>Edit Data siswa</h2>
	<br/>

	<?php
	include 'koneksi.php';
	$noinduk_siswa = $_GET['noinduk_siswa'];
	$data = mysqli_query($koneksi,"select * from siswa where noinduk_siswa='$noinduk_siswa'");
	while($d = mysqli_fetch_array($data)) {
		?>
		<form method="post" action="saveedit.php">
			<table>
				<tr>			
					<td>
						<input type="hidden" name="noinduk_siswa" id="noinduk_siswa" value="<?php echo $d['noinduk_siswa']; ?>">
						<input type="hidden" name="status" value="0">
						
					</td>
				</tr>
				<tr>
				<td>Nama Siswa : </td>
				<td><input type="text" name="nama_siswa" value="<?php echo $d['nama_siswa']; ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin : </td>
				<td><input type="radio" name="jenkel" value="0" <?php if($d['jenkel']=='0') echo 'checked'?>>
					<label for="Laki-Laki"> Laki-Laki</label></td>
				<td><input type="radio" name="jenkel" value="1" <?php if($d['jenkel']=='1') echo 'checked'?>>
					<label for="Perempuan"> Perempuan</label></td>
			</tr>
			<tr>
				<td>Tanggal Lahir : </td>
				<td><input type="date" name="tgllahir" value="<?php echo $d['tgllahir']; ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Masuk : </td>
				<td><input type="date" name="tgl_masuk" value="<?php echo $d['tgl_masuk']; ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Lulus : </td>
				<td><input type="date" name="tgl_lulus" value="<?php echo $d['tgl_lulus']; ?>"></td>
			</tr>
			<tr>
				<td>Alamat : </td>
				<td><input type="long text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
			</tr>
			<tr>
				<td>Anak Ke : </td>
				<td><input type="number" name="anakke" value="<?php echo $d['anakke']; ?>"></td>
			</tr>
			<!-- <tr>
				<td>Walimurid : </td>
				<td><input type="text" name="walmur" value="<?php echo $d['walmur']; ?>"></td>
			</tr> -->
			<tr>
				<td>Walimurid : </td>
				<!-- <?php 
				include 'koneksi.php';
				$datawalmur=mysqli_query($koneksi, "SELECT * FROM walimurid where nik_walmur='$d[walmur]'");
				$d2 = mysqli_fetch_array($datawalmur);

				?>
				<td><input type="text" disabled="disabled" name="walmur" value="<?php echo $d2['nama_walmur'];?>"></td> -->
				<td>
				<select name="walmur" required>
					<option value="">Pilih Walimurid</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM walimurid ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						if ($d['walmur'] == $hasil_kat['nik_walmur']) {
							$select="selected";
						}
						echo "<option $select> $hasil_kat[nama_walmur] </option>";
					}
					?>
				</select>
				 
			</td> 
			</tr>
			<!-- <tr>
				<td>Status Siswa : </td>
				<td>
					<input type="number" name="status_siswa" value="<?php echo $d['status_siswa']; ?>"></td>
			</tr> -->
			<tr>
				<td>Jenis Kelamin : </td>
				<td><input type="radio" name="status_siswa" value="0" <?php if($d['status_siswa']=='0') echo 'checked'?>> 
					<label for="Aktif"> Aktif</label></td>
				<td><input type="radio" name="status_siswa" value="1" <?php if($d['status_siswa']=='1') echo 'checked'?>>
					<label for="Pindah/Keluar"> Pindah/Keluar</label></td>
					<td>
					<input type="radio" name="status_siswa" value="2" <?php if($d['status_siswa']=='2') echo 'checked'?>>
					<label for="Lulus">Lulus</label>
				</td>
			</tr>
				<tr>
					<td><input type="submit" value="SIMPAN" class="btn btn-success">
						<a href="index_siswa.php" class="btn btn-dark">Kembali</a>
					</td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>

</body>
</html>