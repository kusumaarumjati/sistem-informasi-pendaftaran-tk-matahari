<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Walmur</title>
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
	<h2>Tambah Data Walmur</h2>
	<form method="post" action="tambah_walmur_aksi.php">
		<table>
			<tr>
				<td>NIK Wali Murid : </td>
				<td><input type="text" name="nik_walmur"></td>
			</tr>
			<tr>
				<td>Nama Wali Murid : </td>
				<td><input type="text" name="nama_walmur"></td>
			</tr>
			<tr>
				<td>Pekerjaan Wali Murid : </td>
				<td><input type="text" name="pekerjaan_Walmur"></td><br>
				<input type="hidden" name="status" value="0">
			</tr>
			<tr>
				<td><input type="submit" value="SIMPAN" class="btn btn-success">
					<a href="index_walmur.php" class="btn btn-dark"> Kembali </a>
				</td>
				
			</tr>
		</table>
	</form>
</body>
</html>