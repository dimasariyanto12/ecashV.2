<?php
session_start();
error_reporting(0);


include "hak_akses.php";

$nis = "'" . $mysqli->escape_string($_POST['nis']) . "'";
$nama_siswa = "'" . $mysqli->escape_string($_POST['nama_siswa']) . "'";
$jekel_siswa = "'" . $mysqli->escape_string($_POST['jekel_siswa']) . "'";
$alamat_siswa = "'" . $mysqli->escape_string($_POST['alamat_siswa']) . "'";
$id_kelas   = "'" . $mysqli->escape_string($_POST['id_kelas']) . "'";




if(isset($_POST['simpan'])) {
	
	$result = $mysqli->execute("
		INSERT INTO tbl_siswa(nis,nama_siswa,jekel_siswa,alamat_siswa,id_kelas)VALUES( $nis,$nama_siswa,$jekel_siswa,$alamat_siswa,$id_kelas)");

	
	

	if($result) {
		$mysqli->getHistory("Menambahkan Siswa " . $_POST['nama_siswa']);
		
	
	?>
	 <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Siswa  berhasil Di Simpan!", type: "success"},
               function(){ 
                 document.location='?page=siswa'
               }
            );
          });
        </script>
      <?php 
            
        }
        else{
    ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Data Kelas gagal Di Di Simpan!", type: "error"},
           function(){ 
             document.location='?page=siswa'
           }
        );
      });
    </script>
   


	<?php
}
}


else if (isset($_POST['update'])) {
	$idj1 =base64_decode($_POST['id_siswa']);
	$idj2 =base64_decode($idj1);
	$idj3 =base64_decode($idj2);
	$id_siswa   = "'" . $mysqli->escape_string($idj3) . "'";
	
	$result = $mysqli->execute("UPDATE tbl_siswa SET nis = $nis,nama_siswa = $nama_siswa,jekel_siswa = $jekel_siswa,
		alamat_siswa = $alamat_siswa,id_kelas  = $id_kelas
		WHERE 
		id_siswa    = $id_siswa
		");
	
	if($result) {
		$mysqli->getHistory("Mengubah Kelas " . $_POST['nama_kelas']);

		?>

		<script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Siswa  berhasil Di Ubah!", type: "success"},
               function(){ 
                 document.location='?page=siswa'
               }
            );
          });
        </script>
      <?php 
            
        }
        else{
    ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Data Siswa gagal Di Di Ubah!", type: "error"},
           function(){ 
             document.location='?page=siswa'
           }
        );
      });
    </script>
   


	<?php
}
}



else {
	$id1 =base64_decode($_GET['id']);
	$id2 =base64_decode($id1);
	$id3 =base64_decode($id2);
	$result = $mysqli->execute("
		DELETE FROM tbl_siswa WHERE id_siswa='". $id3 ."'");
	

	if($result) {
		$mysqli->getHistory("Menghapus Siswa " . $_POST['nama_siswa']);
		?>

		<script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Siswa  berhasil Di Hapus!", type: "success"},
               function(){ 
                 document.location='?page=siswa'
               }
            );
          });
        </script>
      <?php 
            
        }
        else{
    ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Data Kelas gagal Di Di Hapus!", type: "error"},
           function(){ 
             document.location='?page=siswa'
           }
        );
      });
    </script>
   


	<?php
}
}


?>
