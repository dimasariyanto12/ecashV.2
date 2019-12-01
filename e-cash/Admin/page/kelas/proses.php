<?php
	session_start();
	error_reporting(0);

	
	$id_jurusan = "'" . $mysqli->escape_string($_POST['id_jurusan']) . "'";
	$tingkat_kelas = "'" . $mysqli->escape_string($_POST['tingkat_kelas']) . "'";
	$nama_kelas = "'" . $mysqli->escape_string($_POST['nama_kelas']) . "'";
	$id_user = "'" . $mysqli->escape_string($_POST['id_user']) . "'";
	

if(isset($_POST['simpan'])) {
	$result = $mysqli->execute("
		INSERT INTO tbl_kelas(
			id_jurusan,
			tingkat_kelas,
			nama_kelas,
			id_user,
			status) 
		VALUES(
			$id_jurusan,
			$tingkat_kelas,
			$nama_kelas,
			$id_user,
			'0')
		");

	$mysqli->getHistory("Menambahkan Kelas " . $_POST['nama_kelas']);

	if($result) {
		?>
        <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kelas berhasil Ditambahkan!", type: "success"},
               function(){ 
                 document.location='?page=kelas'
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
        swal({title: "Maaf!", text: "Data Kelas gagal Ditambahkan!", type: "error"},
           function(){ 
             document.location='?page=kelas'
           }
        );
      });
    </script>
   

<?php }} 


else if (isset($_POST['update'])) {
	$idj1 =base64_decode($_POST['id_kelas']);
	$idj2 =base64_decode($idj1);
	$idj3 =base64_decode($idj2);
	
	$id_kelas 	= "'" . $mysqli->escape_string($idj3) . "'";

	$result = $mysqli->execute("
		UPDATE tbl_kelas SET 
			id_jurusan		= $id_jurusan,
			tingkat_kelas	= $tingkat_kelas,
			nama_kelas		= $nama_kelas,
			id_user		= $id_user
		WHERE 
			id_kelas		= $id_kelas
	");
	
	if($result) {
		$mysqli->getHistory("Mengubah Kelas " . $_POST['nama_kelas']);
	?>
			
        <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kelas berhasil Di Ubah!", type: "success"},
               function(){ 
                 document.location='?page=kelas'
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
        swal({title: "Maaf!", text: "Data Kelas gagal Di Ubah!", type: "error"},
           function(){ 
             document.location='?page=kelas'
           }
        );
      });
    </script>
   

<?php }} 


else {
	//decode 
	$id1 =base64_decode($_GET['id']);
	$id2 =base64_decode($id1);
	$id3 =base64_decode($id2);
	
	$result = $mysqli->execute("
		DELETE FROM tbl_kelas WHERE id_kelas='". $id3."'");

	$hapus_semua_siswa = $mysqli->execute("
		DELETE FROM tbl_siswa WHERE id_kelas='". $id3."'");

	if($result) {
		$mysqli->getHistory("Menghapus Kelas ");
	?>
		 <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kelas & Siswa berhasil Di Hapus!", type: "success"},
               function(){ 
                 document.location='?page=kelas'
               }
            );
          });
        </script>
     <?php
	}


} 

?>
