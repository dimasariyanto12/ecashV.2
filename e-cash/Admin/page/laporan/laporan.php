
    <?php 

        include "hak_akses.php";

     ?>


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
          <div class="page-content-wrap">                
 <div class="page-content-wrap">                

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="?page=laporan&aksi=lihat" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kompetensi Keahlian</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_jurusan">
                                    <option value="">Semua</option>
                                    <?php
                                        $query_jurusan = $mysqli->getData("SELECT * FROM tbl_jurusan");

                                        foreach ($query_jurusan as $qj) {
                                    ?>
                                            <option value="<?= $qj['id_jurusan']; ?>"><?= $qj['nama_jurusan']; ?></option>
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
                                    <option value="">Semua</option>
                                    <?php
                                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas");

                                        foreach ($query_kelas as $qk) {
                                    ?>
                                            <option value="<?= $qk['id_kelas']; ?>"><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>     
                            </div>
                        </div>


                    
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right" name="simpan" type="submit"><i class="fa fa-search"></i>Cari</button><br><br>
                    </div>
                </div>
                </form>
            </div>
        </div>                                
        
    </div>