<?php
	
	error_reporting(0);

  include 'hak_akses.php';
	
	$id_transaksi = "'" . $_POST['id_transaksi'] . "'";
	$waktu_transaksi = date('Y-m-d H:i:s');
	$id_siswa = "'" . $mysqli->escape_string($_POST['id_siswa']) . "'";
	$id_kelas = "'" . $mysqli->escape_string($_POST['id_kelas']) . "'";
	$id_user = $_SESSION['id_user'];
	$id_pembayaran = "'" . $mysqli->escape_string($_POST['id_pembayaran']) . "'";
	$nominal_transaksi = "'" . str_replace('.','', $mysqli->escape_string($_POST['nominal_transaksi'])) . "'";
	$pembayaran_melalui = "'" . $mysqli->escape_string($_POST['pembayaran_melalui']) . "'";
	$cicilan_transaksi = "'" . $mysqli->escape_string($_POST['jumlah_cicilan']) . "'";
	
	//Upload Foto
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	$nama_fileex = $_FILES['fupload']['name'];
	$nama_file   = time()."-".$nama_fileex;
	$ukuran 	 = $_FILES['fupload']['size'];

if(isset($_POST['bayar'])) {
	if(empty($lokasi_file)) {
		$result = $mysqli->execute("
			INSERT INTO tbl_transaksi(
				id_transaksi,
				
				id_siswa,
				id_kelas,
				id_user,
				id_pembayaran,
				nominal_transaksi,
				
				
				cicilan_transaksi) 
			VALUES(
				$id_transaksi,
				
				$id_siswa,
				$id_kelas,
				$id_user,
				$id_pembayaran,
				$nominal_transaksi,
				
				
				$cicilan_transaksi)
			");
	} else {
		UploadPembayaran($nama_file);
		$result = $mysqli->execute("
			INSERT INTO tbl_transaksi(
				id_transaksi,
				waktu_transaksi,
				id_siswa,
				id_user,
				id_pembayaran,
				nominal_transaksi,
				
				
				cicilan_transaksi) 
			VALUES(
				$id_transaksi,
				
				$id_siswa,
				$id_user,
				$id_pembayaran,
				$nominal_transaksi,
				$pembayaran_melalui,
				'$nama_file',
				$cicilan_transaksi)
			");
	}

	if($result) {
		$mysqli->getHistory("Melakukan Transaksi");
		$id_transaksi	= base64_encode(base64_encode(base64_encode($_POST['id_transaksi'])));
		$id_siswa 		= base64_encode(base64_encode(base64_encode($_POST['id_siswa'])));
		$id_kelas 		= base64_encode(base64_encode(base64_encode($_POST['id_kelas'])));
		$id_pembayaran 	= base64_encode(base64_encode(base64_encode($_POST['id_pembayaran'])));
		$cicilan 		= base64_encode(base64_encode(base64_encode($_POST['jumlah_cicilan'])));
?>
		<script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "  Transaksi berhasil Ditambahkan!", type: "success"},
               function(){ 
                 document.location='?page=masuk'
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
        swal({title: "Maaf!", text: " Transaksi gagal Ditambahkan!", type: "error"},
           function(){ 
             document.location='?page=masuk'
           }
        );
      });
    </script>
   

<?php }} 

else {
	$result = $mysqli->execute("
		DELETE FROM tbl_pembayaran WHERE id_pembayaran='". $_GET['id'] ."'");

	if($result) {
		$mysqli->getHistory("Menghapus Transaksi");
		echo'<div class="alert alert-success" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Selamat !</strong> Data berhasil dihapus
	    </div>';
	}
	else {
		echo '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Gagal !</strong> Data gagal dihapus
	    </div>';
	}

	?>

	<script type="text/javascript">
		window.Location.href="?page=masuk"
	</script>
	<?php
} 

?>
