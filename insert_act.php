<?php 
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$foto_nama = $_FILES['pas_foto']['name'];
$foto_size = $_FILES['pas_foto']['size'];

if ($foto_size > 2097152) {
	header("location:insert.php?pesan=size");
}else{

	if ($foto_nama != "") {

		$ekstensi_izin = array('png','jpg','jepg');
		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		$file_tmp = $_FILES['pas_foto']['tmp_name'];   
		$tanggal = md5(date('Y-m-d h:i:s'));
		$foto_nama_new = $tanggal.'-'.$foto_nama; 

		if(in_array($ekstensi, $ekstensi_izin) === true)  {
			move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);

            $query = mysqli_query($koneksi, "INSERT INTO siswa VALUES ('','$nama_lengkap', '$kelas', '$alamat', '$foto_nama_new')");

            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

        } else { 
        	header("location:insert.php?pesan=ekstensi");        }

    }else{

    	 $query = mysqli_query($koneksi, "INSERT INTO siswa(siswa_nama, siswa_kelas, siswa_alamat) VALUES ('$nama_lengkap', '$kelas', '$alamat')");
            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

    }

}
?>