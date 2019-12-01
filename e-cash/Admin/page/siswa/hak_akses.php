
<link rel="stylesheet" type="text/css" id="theme" href="../assets/css/alert/sweetalert.css"/>
<script type="text/javascript" src="../assets/js/alert/jquery-1.9.1.min.js"></script>        
<script type="text/javascript" src="../assets/js/alert/sweetalert-dev.js"></script>



<?php
    $level_pegawai = $_SESSION['level_user'];
    $hak_akses = $mysqli->getData("SELECT * FROM tbl_hak_akses WHERE level_pegawai = '". $level_pegawai ."' AND siswa ='1'");
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