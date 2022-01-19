<!DOCTYPE html>
<html>
<head>
	<title>Edit Walmur</title>
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
	<h2>Edit Data Walmur</h2>
	<br/>
	

	<?php
	include 'koneksi.php';
	$nik_walmur = $_GET['nik_walmur'];
	$data = mysqli_query($koneksi,"select * from walimurid where nik_walmur='$nik_walmur'");
	while($d = mysqli_fetch_array($data)) {
		?>
		<form method="post" action="update_walmur.php">
			<table>
				<tr>			
					<td>
						<input type="hidden" name="nik_walmur" id="nik_walmur" value="<?php echo $d['nik_walmur']; ?>">
					</td>
				</tr>
				<tr>			
					<td>Nama Walimurid : </td>
					<td>
						<input type="text" name="nama_walmur" value="<?php echo $d['nama_walmur']; ?>">
						<input type="hidden" name="status" value="0">
					</td>
				</tr>
				<tr>
					<td>Pekerjaan Walimurid</td>
					<td><input type="text" name="pekerjaan_Walmur" value="<?php echo $d['pekerjaan_Walmur']; ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" value="SIMPAN" class="btn btn-success">
						<a href="index_walmur.php" class="btn btn-dark">Kembali</a>
					</td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>

</body>
</html>