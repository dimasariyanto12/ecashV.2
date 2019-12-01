<link rel="stylesheet" type="text/css" id="theme" href="assets/css/alert/sweetalert.css"/>
<script type="text/javascript" src="assets/js/alert/jquery-1.9.1.min.js"></script>        
<script type="text/javascript" src="assets/js/alert/sweetalert-dev.js"></script>

<?php
           session_start();
    
          include "Databases.php";
          $mysqli = new Databases();

    // untuk mengecek data tersebut sudah diset / tidak jika sudah maka bernilai true jika belum maka false
    if (isset($_POST['masuk'])){
    $email_users    = stripslashes($_REQUEST['email_users']); 
    $password_users = stripslashes($_REQUEST['password_users']);
    
        $enskripsi = hash("sha1" , (hash("sha1",$password_users)));
        $query = $mysqli->getData("SELECT * FROM tbl_user WHERE email_user='" . $email_users . "' AND password_user='". $enskripsi ."' AND aktif_user='1'");


    $rows = count($query); 

        if($rows==1){

            foreach ($query as $r) {
                 $_SESSION['id_user'] = $r['id_user'];
                $_SESSION['nip'] = $r['nip'];
                $_SESSION['nama_user'] = $r['nama_user'];
                $_SESSION['alamat_user'] = $r['alamat_user'];
                $_SESSION['telp_user'] = $r['telp_user'];
            
                $_SESSION['email_user'] = $r['email_user'];
          $_SESSION['password_user']   = $r['password_user'];
          $_SESSION['level_user'] = $r['level_user'];
          $_SESSION['aktif_user'] = $r['aktif_user'];
           $_SESSION['idkelas'] = $r['idkelas'];
          $_SESSION['kodeakses'] = $key;
            }
  
            $mysqli->getHistory("Telah Login");
      ?>
        <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: "Selamat anda berhasil login!", type: "success"},
               function(){ 
                 document.location='dashboard.php?page=home'
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
        swal({title: "Maaf!", text: "Password atau Email yang anda masukan salah!", type: "error"},
           function(){ 
             document.location='login.php'
           }
        );
      });
    </script>
   

<?php }} ?>