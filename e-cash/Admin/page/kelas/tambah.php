<!-- Day 6 -->
<?php   include 'hak_akses.php'; ?>
  <section class="content-header">

  <h1>
   <li class="fa fa-plus-square">  Tambah Data Kelas </li>
<b>|</b>
   <small>SMKN 1 BANGSRI</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
  <li><a href="#">Kelas </a></li>
  <li class="active">Tambah Kelas</li>
</ol>
</section>
    <!-- END BREADCRUMB -->    
<br>
  

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal"  method="POST" action="?page=kelas&aksi=proses" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <br>
                    </div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jurusan</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_jurusan" data-live-search="true">
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
                            <label class="col-md-3 col-xs-12 control-label">Tingkat</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="tingkat_kelas">
                                    <option  value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas" required=""/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Wali Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_user" data-live-search="true">
                                    <?php
                                        $query_user = $mysqli->getData("SELECT * FROM tbl_user WHERE level_user='Wali Kelas'");

                                        foreach ($query_user as $qj) {
                                    ?>
                                            <option value="<?= $qj['id_user']; ?>"><?= $qj['nama_user']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>    
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel-footer">
                       <a href="?page=kelas" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>Batal</a>
                        <button class="btn btn-primary " value="simpan" name="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        <br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>
