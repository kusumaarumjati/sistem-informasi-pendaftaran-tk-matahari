<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:index_login.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran TK</title>
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
    body {
      background-color: #fff;
      font-family: "Segoe UI";
    }
    #wrapper {
      background-color: #fff;
      width: 400px;
      height: 330px;
      margin-top: 120px;
      margin-left: auto;
      margin-right: auto;
      padding: 20px;
      border-radius: 4px;
    }
    
    
  </style>

</head>
<body>
	<!-- <h2>Pendaftaran TK</h2>
	<br/>
	<h3>Menu</h3>
	<a href="walmur/index_walmur.php">Walimurid</a>
	<br>
	<a href="jenis_pembayaran/index_jenis.php">Jenis Pembayaran</a>
	<br>
	<a href="siswa/index_siswa.php">Pendaftaran Siswa</a> -->
<!-- 	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9FE2BF">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="walmur/index_walmur.php">Walimurid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jenis_pembayaran/index_jenis.php">Jenis Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="siswa/index_siswa.php">Pendaftaran Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pembayaran/index_pembayaran.php">Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>

      </ul>
    </div>
  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9FE2BF">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">TK MATAHARI</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="../walmur/index_walmur.php">Walimurid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../jenis_pembayaran/index_jenis.php">Jenis Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../siswa/index_siswa.php">Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pembayaran/index_pembayaran.php">Pembayaran</a>
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Rekap
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../rekap/pendaftaran.php">Rekap Pembayaran Pendaftaran</a></li>
            <li><a class="dropdown-item" href="../rekap/spp.php">Rekap SPP</a></li>
            <li><a class="dropdown-item" href="../rekap/sp_daftar.php">Pembayaran Pendaftaran</a></li>
             <li><a class="dropdown-item" href="../rekap/sp_spp.php">Pembayaran SPP</a></li>
             <li><a class="dropdown-item" href="../rekap/sp_daftar_spp.php">Pembayaran</a></li>
              <li><a class="dropdown-item" href="../rekap/sp_siswa_pindah.php">Siswa Pindah</a></li>
               <li><a class="dropdown-item" href="../rekap/sp_siswa_lulus.php">Siswa Lulus</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown" style="margin-left: 630px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['nama_peg']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- <h1>Yay! Selamat datang : <?php echo $_SESSION['nama_admin']; ?></h1> -->
<img src="1.jpg" style="padding-top: 50px">
<div style="margin-top: -320px; margin-left: 650px; font-family: Segoe UI">
  <h2 style="font-family: Segoe UI">SELAMAT DATANG <?php echo $_SESSION['nama_peg']; ?> DI TK MATAHARI</h2>
  <br>
  <p>Di TK Matahari anak anak tidak hanya belajar membaca dan menulis.
  Namun juga belajar cara bersosialisasi dengan orang banya, belajar tentanng hewan. Dan masih banyak lagi<br>
  <br>
<button type="button" class="btn btn-outline-success" href="home.php">HOME</button>
</p>
</div>




<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
</body>
</html>