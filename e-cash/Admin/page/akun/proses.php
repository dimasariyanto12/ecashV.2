<?php


	
	$nip = "'" . $mysqli->escape_string($_POST['nip']) . "'";
	$nama_user = "'" . $mysqli->escape_string($_POST['nama_user']) . "'";
	$alamat_user = "'" . $mysqli->escape_string($_POST['alamat_user']) . "'";
	$telp_user = "'" . $mysqli->escape_string($_POST['telp_user']) . "'";
	$email_user = "'" . $mysqli->escape_string($_POST['email_user']) . "'";
	$password1 = $_POST['password_user'];
	$password2 = $_POST['repassword_user'];

	$password_user = hash("sha1" , (hash("sha1",$password1)));

	//Upload Foto
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_fileex = $_FILES['fupload']['name'];
	$nama_file   = time()."-".$nama_fileex;
	$ukuran 	 = $_FILES['fupload']['size'];

if (isset($_POST['update'])) {
	$id_user 	= $_SESSION['id_user'];
	
	if((empty($password1)) AND (empty($password2))) {
		if(empty($lokasi_file)) {
			$result = $mysqli->execute("
				UPDATE tbl_user SET 
					nip				= $nip,
					nama_user	= $nama_user,
					alamat_user	= $alamat_user,
					telp_user	= $telp_user,
					email_user	= $email_user
				WHERE 
					id_user		= '$id_user'
			");
		} else {
			Uploaduser($nama_file);
			$result = $mysqli->execute("
				UPDATE tbl_user SET 
					nip				= $nip,
					nama_user	= $nama_user,
					alamat_user	= $alamat_user,
					telp_user	= $telp_user,
					foto_user 	= '$nama_file',
					email_user	= $email_user
				WHERE 
					id_user		= '$id_user'
			");
			$foto_lama = $_POST['fupload_lama'];
			if ($foto_lama<>"default.jpg") {
				unlink("../../assets/img/user/". $foto_lama);
			}

			$_SESSION['foto_user'] = $nama_file;
			
		}

		if($result) {
			echo '<div class="alert alert-success" role="alert">
		        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <strong>Selamat !</strong> Data berhasil diubah
		    </div>';
		}
		else {
			echo'<div class="alert alert-danger" role="alert">
		        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <strong>Gagal !</strong> Data gagal disimpan, mungkin data yang anda masukan salah
		    </div>';
		}
	}else {
		if($password1==$password2) {
			if(empty($lokasi_file)) {
				$result = $mysqli->execute("
					UPDATE tbl_user SET 
						nip				= $nip,
						nama_user	= $nama_user,
						alamat_user	= $alamat_user,
						telp_user	= $telp_user,
						email_user	= $email_user,
						password_user= '$password_user'
					WHERE 
						id_user		= '$id_user'
				");
			} else {
				Uploaduser($nama_file);
				$result = $mysqli->execute("
					UPDATE tbl_user SET 
						nip				= $nip,
						nama_user	= $nama_user,
						alamat_user	= $alamat_user,
						telp_user	= $telp_user,
						foto_user 	= '$nama_file',
						email_user	= $email_user,
						password_user= '$password_user'
					WHERE 
						id_user		= '$id_user'
				");
				$foto_lama = $_POST['fupload_lama'];
				if ($foto_lama<>"default.jpg") {
					unlink("../../assets/img/user/". $foto_lama);
				}

				$_SESSION['foto_user'] = $nama_file;
				
			}

			if($result) {
				echo '<div class="alert alert-success" role="alert">
			        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <strong>Selamat !</strong> Data berhasil diubah
			    </div>';
			}
			else {
				echo '<div class="alert alert-danger" role="alert">
			        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <strong>Gagal !</strong> Data gagal disimpan, mungkin data yang anda masukan salah
			    </div>';
			}
		}
		else {
			echo '<div class="alert alert-danger" role="alert">
		        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <strong>Gagal !</strong> Password Tidak Sama
		    </div>';
		}
		
	}

}
?>
