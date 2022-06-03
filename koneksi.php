<?php 	
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_siswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
	die("Koneksi Gagal terhubung:".mysqli_connect_error());
	}
 ?>