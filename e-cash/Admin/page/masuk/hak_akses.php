<?php
    $level_pegawai = $_SESSION['level_user'];
    $hak_akses = $mysqli->getData("SELECT * FROM tbl_hak_akses WHERE level_pegawai = '". $level_pegawai ."' AND transaksi ='1'");
    if(empty($hak_akses)) {
       ?>
         <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: " Anda Tidak diizinkan Mengakses Halaman Ini", type: "error"},
           function(){ 
             window.location.href='dashboard.php?page=home'
           }
        );
      });
    </script>
   

<?php }