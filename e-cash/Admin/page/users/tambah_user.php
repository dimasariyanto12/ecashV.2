<?php
  include "hak_akses.php";
?> 
   
   <section class="content-header">
          <h1><i class="fa fa-users"></i>Data User |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data User | Bendahara | Guru</a></li>
            <li class="active">Data User</li>
          </ol>
          <br>


    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal" action="?page=users&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <br>
                    </div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">NIP | NIS</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nip" placeholder="Masukan NIP/NIS" required="" onkeypress="return isNumberKey(event)" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_user" placeholder="Masukan Nama Lengkap User" required=""/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap</label>
                            <div class="col-md-6 col-xs-12">   
                                <textarea class="form-control" rows="5" name="alamat_user" placeholder="Masukan Alamat Lengkap User" required=""></textarea>
                            </div>
                        </div>

                      

                       
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="email" class="form-control" name="email_user" placeholder="Masukan Email User" required=""/>    
                            </div>
                        </div>
                          
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password user</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="password" class="form-control" name="telp_user" placeholder="Masukan Password User" required=""/>    
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Level</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="level_user">
                                    <option value="Wali Kelas">Wali Kelas</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Admin">Admin</option>
                                </select>    
                            </div>
                        </div>

                        

                         <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_kelas" required="">
                                     <option>~~~~~~Pilih Kelas~~~~~~</option>
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


                          <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Aktif</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="aktif_user">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>    
                            </div>
                        </div>
                    </div>

                     
                    <div class="panel-footer">
                        <a href="?page=users" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary " name="simpan">Simpan</button><br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
       


