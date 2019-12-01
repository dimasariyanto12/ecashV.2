<?php
$id1 =base64_decode($_GET['id']);
    $id2 =base64_decode($id1);
    $id3 =base64_decode($id2);
    $result = $mysqli->execute("
        DELETE FROM tbl_pembayaran WHERE id_pembayaran='". $id3 ."'");

    if($result) {
       
       ?>
      
		<script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Pembayaran berhasil Di Hapus!", type: "success"},
               function(){ 
                 document.location='?page=pengaturan'
               }
            );
          });
        </script>
        <?php

} 