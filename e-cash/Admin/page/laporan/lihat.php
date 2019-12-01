<?php
  
    include "hak_akses.php";

    if(empty($_POST['id_jurusan'])) {
        $id_jurusan = "";
    }

    else {
        $id_jurusan = "AND tbl_kelas.id_jurusan='" . $_POST['id_jurusan'] ."'";
    }

    if(empty($_POST['id_kelas'])) {
        $id_kelas = "";
    }

    else {
        $id_kelas = "AND tbl_siswa.id_kelas='" . $_POST['id_kelas'] ."'";
    }

 $urutkan = "ORDER BY tbl_siswa.nis " .  $_POST['urutkan'];


    $query = "SELECT * FROM tbl_siswa, tbl_kelas, tbl_jurusan WHERE tbl_siswa.id_kelas = tbl_kelas.id_kelas AND tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan $id_jurusan $id_kelas $angkatan $aktif_siswa $urutkan";
    $result = $mysqli->getData($query);

// Jika Sudah Login
  
?>      
    <!-- START BREADCRUMB -->
     <section class="content-header">
          <h1><i class="fa fa-user"></i>
Laporan Data Siswa  |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Report </a></li>
           
            <li class="active">Laporan Data Siswa </li>
          </ol>
          <br>
    <!-- END BREADCRUMB -->    

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">                

        <div class="row">
            <div class="col-md-12">
                <?= @$_SESSION['status']; 
                    unset($_SESSION['status']);
                ?>
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Data <?= $page; ?></h3>

                      

                                                       
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th><center>NIS</center></th>
                                    <th><center>Nama</center></th>
                                    <th><center>Jenis Kelamin</center></th>
                                    <th><center>Jurusan</center></th>
                                    <th><center>Kelas</center></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($result as $r) {
                                ?>

                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= ucfirst($r['nis']); ?></td>
                                    <td><?= ucfirst($r['nama_siswa']); ?></td>
                                    <td><?= ucfirst($r['jekel_siswa']); ?></td>
                                    <td><?= ucfirst($r['nama_jurusan']); ?></td>
                                    <td><?= $mysqli->format_romawi($r['tingkat_kelas']); ?> <?= ucfirst($r['nama_kelas']); ?></td>
                                  

                                </tr>

                                <?php
                                    $i++;
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>                                
        
    </div>
    <!-- PAGE CONTENT WRAPPER -->

