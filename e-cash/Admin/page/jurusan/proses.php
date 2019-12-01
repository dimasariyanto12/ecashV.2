<?php
	
	error_reporting(0);


	
	include "hak_akses.php";
	
	$nama_jurusan = "'" . $mysqli->escape_string($_POST['nama_jurusan']) . "'";
	$diskripsi_jurusan = "'" . $mysqli->escape_string($_POST['diskripsi_jurusan']) . "'";
	

if(isset($_POST['simpan'])) {
	$result = $mysqli->execute("
		INSERT INTO tbl_jurusan(
			nama_jurusan,
			diskripsi_jurusan) 
		VALUES(
			$nama_jurusan,
			$diskripsi_jurusan)
		");

	if($result) {
		$mysqli->getHistory("Menambahkan Jurusan " . $_POST['nama_jurusan']);
	?>
		 <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kompentensi Keahlian berhasil Disimpan!", type: "success"},
               function(){ 
                 document.location='?page=jurusan'
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
        swal({title: "Maaf!", text: "Data Kelas gagal Di Disimpan!", type: "error"},
           function(){ 
             document.location='?page=jurusan'
           }
        );
      });
    </script>
   

<?php }} 

else if (isset($_POST['update'])) {
	$idj1 =base64_decode($_POST['id_jurusan']);
	$idj2 =base64_decode($idj1);
	$idj3 =base64_decode($idj2);
	
	$id_jurusan 	= "'" . $mysqli->escape_string($idj3) . "'";

	$result = $mysqli->execute("
		UPDATE tbl_jurusan SET 
			nama_jurusan		= $nama_jurusan,
			diskripsi_jurusan	= $diskripsi_jurusan
		WHERE 
			id_jurusan		= $id_jurusan
	");


	if($result) {
		$mysqli->getHistory("Mengubah Jurusan " . $_POST['nama_jurusan']);
		?>
		 <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kompentensi Keahlian berhasil Diubah!", type: "success"},
               function(){ 
                 document.location='?page=jurusan'
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
        swal({title: "Maaf!", text: "Data Kompentensi Keahlian gagal Diubah!", type: "error"},
           function(){ 
             document.location='?page=jurusan'
           }
        );
      });
    </script>
   

<?php }



} 



else {
	$id1 =base64_decode($_GET['id']);
	$id2 =base64_decode($id1);
	$id3 =base64_decode($id2);
	$result = $mysqli->execute("
		DELETE FROM tbl_jurusan WHERE id_jurusan='". $id3 ."'");
	
	if($result) {
		$mysqli->getHistory("Menghapus Jurusan");
	?>
		 <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Data Kompentensi Keahlian berhasil Di Hapus!", type: "success"},
               function(){ 
                 document.location='?page=jurusan'
               }
            );
          });
        </script>
     <?php
 
}
} 
?>





							