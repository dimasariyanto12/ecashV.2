<?php
  include "hak_akses.php";
  $nip = "'" . $mysqli->escape_string($_POST['nip']) . "'";
  $nama_user = "'" . $mysqli->escape_string($_POST['nama_user']) . "'";
  $alamat_user = "'" . $mysqli->escape_string($_POST['alamat_user']) . "'";
  $telp_user = "'" . $mysqli->escape_string($_POST['telp_user']) . "'";
  $password_user = hash("sha1" , (hash("sha1",$_POST['telp_user'])));
  $email_user = "'" . $mysqli->escape_string($_POST['email_user']) . "'";
  $level_user   = "'" . $mysqli->escape_string($_POST['level_user']) . "'";
  $aktif_user   = "'" . $mysqli->escape_string($_POST['aktif_user']) . "'";
  $id_kelas   = "'" . $mysqli->escape_string($_POST['id_kelas']) . "'";
  
  

if(isset($_POST['simpan'])) {
  
    $result = $mysqli->execute("
      INSERT INTO tbl_user(
        nip,
        nama_user,
        alamat_user,
        telp_user,
        email_user,
        password_user,
        level_user,
        aktif_user,
        idkelas) 
      VALUES(
        $nip,
        $nama_user,
        $alamat_user,
        $telp_user,
        $email_user,
        '$password_user',
        $level_user,
        $aktif_user,
        $id_kelas
        )
      ");
  
	

	if($result) {
       ?>
       
      <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "  Data User berhasil di tambahkan!", type: "success"},
               function(){ 
                 document.location='?page=users'
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
        swal({title: "Maaf!", text: "Data User gagal di tambahkan!", type: "error"},
           function(){ 
             document.location='?page=users'
           }
        );
      });
    </script>
   

<?php }} 

else if (isset($_POST['update'])) {
	$id_user 	= "'" . $mysqli->escape_string($_POST['id_user']) . "'";
	$result = $mysqli->execute("
		UPDATE tbl_user SET 
			nip				= $nip,
			nama_user	= $nama_user,
			alamat_user	= $alamat_user,
			telp_user	= $telp_user,
			level_user	= $level_user
			
		WHERE 
			id_user		= $id_user
	");
	
	if($result) {
		$mysqli->getHistory("Mengubah Pengguna " . $_POST['nama_user']);
		 ?>
       
      <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "  Data User berhasil di ubah!", type: "success"},
               function(){ 
                 document.location='?page=users'
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
        swal({title: "Maaf!", text: "Data User gagal di ubah!", type: "error"},
           function(){ 
             document.location='?page=users'
           }
        );
      });
    </script>
   

<?php }} 

else {
	$result = $mysqli->execute("
		DELETE FROM tbl_user WHERE id_user='". $_GET['id'] ."'");
	if ($_GET['foto_user']<>"default.jpg") {
		unlink("../../assets/img/user/". $_GET['foto_user']);
	}

	if($result) {
		$mysqli->getHistory("Menghapus Pengguna");
	 ?>
       
      <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "  Data User berhasil di hapus!", type: "success"},
               function(){ 
                 document.location='?page=users'
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
        swal({title: "Maaf!", text: "Data User gagal di hapus!", type: "error"},
           function(){ 
             document.location='?page=users'
           }
        );
      });
    </script>
   

<?php }} 
?>
