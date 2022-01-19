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

	<h2>Data Siswa</h2>
	<br/>
	<a href="tambah_siswa.php" class="btn btn-dark" style="margin-left: 10px">+ Tambah Siswa </a>
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
			<th>NOINDUK SISWA</th>
			<th>NAMA SISWA</th>
			<th>JENIS KELAMIN</th>
			<th>TANGGAL LAHIR</th>
			<th>TANGGAL MASUK</th>
			<th>TANGGAL LULUS</th>
			<th>ALAMAT</th>
			<th>ANAK KE</th>
			<th>WALI MURID</th>
			<th>STATUS SISWA</th>
			<th>AKSI</th>
		</tr>
		<?php
		$no = 1;
		include 'koneksi.php';
		$query = "SELECT si.noinduk_siswa, si.nama_siswa, si.jenkel, si.tgllahir, si.tgl_masuk, si.tgl_lulus, si.alamat, si.anakke, si.walmur,si.status, si.status_siswa FROM siswa si JOIN walimurid w ON si.walmur = w.nik_walmur";
		$data = mysqli_query($koneksi, $query);
		
		while ($d = mysqli_fetch_array($data)) {
			if ($d['status'] == 0 && $d['status_siswa'] == 0 && $d['tgl_lulus'] == '0000-00-00') {
		?>
		<tr>
			<td><?php echo $no++ ?></td>
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
			<td><?php echo $d['noinduk_siswa']; ?></td>
			<td><?php echo $d['nama_siswa']; ?></td>
			<td>
			<?php 
			if ($d['jenkel'] == 1){
				echo "Perempuan";
			} else {
				echo "Laki Laki";
			}
			?>
			</td>
			<td><?php echo $d['tgllahir']; ?></td>
			<td><?php echo $d['tgl_masuk']; ?></td>
			<td><?php echo $d['tgl_lulus']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
			<td><?php echo $d['anakke']; ?></td>
			<?php
				$datawalmur=mysqli_query($koneksi, "SELECT * FROM walimurid where nik_walmur='$d[walmur]'");
				$d2 = mysqli_fetch_array($datawalmur);
			?>
			<td><?php echo $d2['nama_walmur']; ?></td>
			<td>
			<?php 
			if ($d['status_siswa'] == 0){
				echo "Aktif";
			}
			?>
			</td>
			<td>
				<a href="edit_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" class="btn btn-primary">EDIT</a> <br>
				<!-- <a href="hapus_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" onclick="return confirm('apakah anda yakin untuk menghapus?')" class="btn btn-danger">HAPUS</a> -->
				<a href="hide_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan?')" class="btn btn-danger">HAPUS</a>
			</td>
		</tr>
		<?php
		}	
		}
		?>
	</table>

</body>
</html>