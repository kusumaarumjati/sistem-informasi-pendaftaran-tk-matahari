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
	<?php
	include 'koneksi.php';
	$query ="SELECT max(noinduk_siswa) as kode FROM siswa";
	$data1 = mysqli_query($koneksi, $query);
	$data2 = mysqli_fetch_array($data1);
	$kodesis = $data2['kode'];
	$urutan = (int) substr($kodesis, 3, 4);
	$urutan = $urutan+1;
	$huruf = "SWA";
	$kodesis = $huruf . sprintf("%04s", $urutan)
	?>
	<h2>Pendaftaran Siswa</h2>
	<br/>
	<form method="POST" action="">
		<table>
			<tr>
				<td>No Induk Siswa :  </td>
				<td><input type="text" name="noinduk_siswa" value="<?php echo $kodesis ?>" readonly="readonly" required></td>
				<input type="hidden" name="status" value="0">
				<!-- <input type="hidden" name="status_siswa" value="0"> -->
			</tr>
			<tr>
				<td>Nama Siswa : </td>
				<td><input type="text" name="nama_siswa"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin : </td>
				<td><input type="radio" name="jenkel" value="0">
					<label for="Laki-Laki"> Laki-Laki</label></td>
				<td><input type="radio" name="jenkel" value="1">
					<label for="Perempuan"> Perempuan</label></td>
			</tr>
			<tr>
				<td>Tanggal Lahir : </td>
				<td><input type="date" name="tgllahir"></td>
			</tr>
			<tr>
				<td>Tanggal Masuk : </td>
				<td><input type="date" name="tgl_masuk"></td>
			</tr>
			<tr>
				<td>Tanggal Lulus : </td>
				<td><input type="hidden" name="tgl_lulus" value="0000-00-00"></td>
			</tr>
			<tr>
				<td>Alamat : </td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Anak Ke : </td>
				<td><input type="number" name="anakke"></td>
			</tr>
			<tr>
				<td>Status siswa: </td>
				<td><input type="number" name="status_siswa" value="0" readonly="readonly"></td>
			</tr>
			<tr>
				<td>Walimurid : </td>
				<!-- <td><input type="text" name="walmur"></td> -->
				<td>
				<select name="walmur" required>
					<option value="">Pilih Walimurid</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM walimurid ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						echo "<option value='$hasil_kat[nik_walmur]'> $hasil_kat[nama_walmur] </option>";
					}
					?>
				</select>
			</td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" value="SIMPAN" class="btn btn-success" style="margin-top: 40px">
					<a href="index_siswa.php" class="btn btn-dark" style="margin-top: 40px"> Kembali </a>
				</td>
			</tr>
		</table>
	</form>
	<?php
	include 'koneksi.php';
	if (isset($_POST['simpan'])) {
		$insert = mysqli_query($koneksi, "INSERT INTO siswa VALUES
			('".$_POST['noinduk_siswa']."',
			'".$_POST['nama_siswa']."',
			'".$_POST['jenkel']."',
			'".$_POST['tgllahir']."',
			'".$_POST['tgl_masuk']."',
			'".$_POST['tgl_lulus']."',
			'".$_POST['alamat']."',
			'".$_POST['anakke']."',
			'".$_POST['walmur']."',
			'".$_POST['status']."',
			'".$_POST['status_siswa']."')");
		if ($insert) {
			echo "<script>alert('Data berhasil disimpan');window.location='index_siswa.php'</script>";
		}
		else{
			echo "<script>alert('Data gagal disimpan')</script>", mysqli_error($koneksi);
		}
	}
	?>
</body>
</html>
