<?php
    $level_pegawai = $_SESSION['level_user'];
    $hak_akses = $mysqli->getData("SELECT * FROM tbl_hak_akses WHERE level_pegawai = '". $level_pegawai ."' AND kelas ='1'");
    if(empty($hak_akses)) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Maaf, Anda Tidak diizinkan Mengakses Halaman Ini');
                window.location.href='dashboard.php?page=home';
                </script>");
    }
?>