<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		$id = $_GET['id'];

		$get_foto = "SELECT siswa_foto FROM siswa WHERE id_siswa='$id'";
		$data_foto = mysqli_query($koneksi, $get_foto); 
     
		$foto_lama = mysqli_fetch_array($data_foto);

		unlink("foto/".$foto_lama['siswa_foto']);    

		$query = mysqli_query($koneksi,"DELETE FROM siswa WHERE id_siswa='$id'");
		if ($query) {
			header("location:index.php?pesan=hapus");
		}else{
			header("location:index.php?pesan=gagalhapus");
		}
		
	}else{
	
		header("location:index.php");
	}
}else{
	header("location:index.php");
}

?>