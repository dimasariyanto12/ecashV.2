<?php

    include "hak_akses.php";
   $idkelas = @$_SESSION['idkelas'];
?>      
    <!-- START BREADCRUMB -->
    <section class="content-header">
          <h1><i class="fa fa-credit-card"></i>
                Laporan Pembayaran Siswa  |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-credit-card"></i> Laporan </a></li>
           
            <li class="active">Laporan Pembayaran Siswa </li>
          </ol>
          <br>

    <div class="page-content-wrap">                

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="?page=lprn_pembayaran&aksi=lihat" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <br>
                    </div>
                    <div class="panel-body">
                        <!-- <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">NIS</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input class="form-control" type="text" name="nis" placeholder="Masukan Nomor Induk Siswa" onkeypress="return isNumberKey(event)">     
                            </div>
                        </div> -->

                              <div class="form-group" hidden="">                          
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_pembayaran">
                                     <option value="all">all</option>
                                    <?php
                                        $query_pembayaran = $mysqli->getData('SELECT * FROM tbl_pembayaran');

                                        foreach ($query_pembayaran as $qp) {
                                    ?>
                                            <option value="<?= $qp['id_pembayaran']; ?>"><?= $qp['nama_pembayaran']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>     
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_kelas">
                                    <?php
                                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas WHERE id_kelas=$idkelas");

                                        foreach ($query_kelas as $qk) {
                                    ?>
                                            <option value="<?= $qk['id_kelas']; ?>"><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>     
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Status Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="status_lunas">
                                    <option value="all">Semua</option>
                                    <option value="LUNAS">Lunas</option>
                                    <option value="BELUM LUNAS">Belum Lunas</option>
                                </select>    
                            </div>
                        </div>
                    </div>

                    
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right" type="submit" name="simpan">Cari</button><br><br>
                    </div>
                </div>
                </form>
            </div>
        </div>                                
        
    </div>
    <!-- PAGE CONTENT WRAPPER -->

