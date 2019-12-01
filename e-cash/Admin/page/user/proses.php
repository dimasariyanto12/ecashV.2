<?php

	include "hak_akses.php";
	$nip = "'" . $mysqli->escape_string($_POST['nip']) . "'";
	$nama_pegawai = "'" . $mysqli->escape_string($_POST['nama_pegawai']) . "'";
	$alamat_pegawai = "'" . $mysqli->escape_string($_POST['alamat_pegawai']) . "'";
	$telp_pegawai = "'" . $mysqli->escape_string($_POST['telp_pegawai']) . "'";
	$password_pegawai = hash("sha1" , (hash("sha1",$_POST['telp_pegawai'])));
	$email_pegawai = "'" . $mysqli->escape_string($_POST['email_pegawai']) . "'";
	$level_pegawai 	= "'" . $mysqli->escape_string($_POST['level_pegawai']) . "'";
	$aktif_pegawai 	= "'" . $mysqli->escape_string($_POST['aktif_pegawai']) . "'";
	
	

if(isset($_POST['simpan'])) {
	
		$result = $mysqli->execute("
			INSERT INTO tbl_pegawai(
				nip,
				nama_pegawai,
				alamat_pegawai,
				telp_pegawai,
				email_pegawai,
				password_pegawai,
				level_pegawai) 
			VALUES(
				$nip,
				$nama_pegawai,
				$alamat_pegawai,
				$telp_pegawai,
				$email_pegawai,
				'$password_pegawai',
				$level_pegawai
				)
			");
	
	

	if($result) {
		$mysqli->getHistory("Menambahkan Pengguna " . $_POST['nama_pegawai']);
		echo'<div class="alert alert-success" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Selamat !</strong> Data berhasil disimpan
	    </div>';
	} else {
		echo '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Gagal !</strong> Data gagal disimpan, mungkin data yang anda masukan salah
	    </div>';
	}
	
	header('Location: index.php');
}

else if (isset($_POST['update'])) {
	$id_pegawai 	= "'" . $mysqli->escape_string($_POST['id_pegawai']) . "'";
	$result = $mysqli->execute("
		UPDATE tbl_pegawai SET 
			nip				= $nip,
			nama_pegawai	= $nama_pegawai,
			alamat_pegawai	= $alamat_pegawai,
			telp_pegawai	= $telp_pegawai,
			level_pegawai	= $level_pegawai
			
		WHERE 
			id_pegawai		= $id_pegawai
	");
	
	if($result) {
		$mysqli->getHistory("Mengubah Pengguna " . $_POST['nama_pegawai']);
		echo '<div class="alert alert-success" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Selamat !</strong> Data berhasil diubah
	    </div>';

    } else {
		echo '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Gagal !</strong> Data gagal disimpan, mungkin data yang anda masukan salah
	    </div>';
	}
	header("Location: index.php");
}
else {
	$result = $mysqli->execute("
		DELETE FROM tbl_pegawai WHERE id_pegawai='". $_GET['id'] ."'");
	if ($_GET['foto_pegawai']<>"default.jpg") {
		unlink("../../assets/img/pegawai/". $_GET['foto_pegawai']);
	}

	if($result) {
		$mysqli->getHistory("Menghapus Pengguna");
		echo'<div class="alert alert-success" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Selamat !</strong> Data berhasil dihapus
	    </div>';
	} else {
		echo '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Gagal !</strong> Data gagal dihapus
	    </div>';
	}

	header("Location: index.php");
} 

?>
