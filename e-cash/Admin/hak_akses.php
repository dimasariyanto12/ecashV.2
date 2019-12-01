<?php


    $level_pegawai = $_SESSION['level_user'];
    $hak_akses = $mysqli->getData("SELECT * FROM tbl_hak_akses WHERE level_pegawai = '". $level_pegawai ."'");
?>