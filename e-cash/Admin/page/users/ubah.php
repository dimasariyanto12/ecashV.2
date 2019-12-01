<?php
    
    include "hak_akses.php";
    $id = $_GET['id'];
    $result = $mysqli->getData("SELECT * FROM tbl_user WHERE id_user='$id'");
    foreach ($result as $r):    
?> 
    <!-- START BREADCRUMB -->
   
   <section class="content-header">
          <h1><i class="fa fa-users"></i>Ubah Data User |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Ubah Data User | Bendahara | Guru</a></li>
            <li class="active">Data User</li>
          </ol>
          <br>
    <!-- END BREADCRUMB -->   

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal" action="?page=users&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ubah Data User</h3>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" class="form-control" name="id_user" required="" value="<?= $r['id_user']; ?>" />
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">NIP/NIS</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nip" placeholder="Masukan Nomor Induk user" required="" value="<?= $r['nip']; ?>" onkeypress="return isNumberKey(event)" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama User</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_user" placeholder="Masukan Nama Lengkap user" required="" value="<?= $r['nama_user']; ?>"/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap</label>
                            <div class="col-md-6 col-xs-12">   
                                <textarea class="form-control" rows="5" name="alamat_user" placeholder="Masukan Alamat Lengkap user" required=""><?= $r['alamat_user']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group" hidden="">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="telp_user" placeholder="Masukan Telepon user" required="" value="<?= $r['telp_user']; ?>" onkeypress="return isNumberKey(event)"/>    
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Level</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="level_user">
                                    <?php 
                                        if($r['level_user']=='Bendahara') { 
                                            echo '<option value="Bendahara" selected="">Bendahara</option>';
                                            echo '<option value="Admin">Admin</option>';
                                            echo '<option value="Wali Kelas">Wali Kelas</option>'; 
                                             
                                        } 
                                        else if($r['level_user']=='Admin') { 
                                            echo '<option value="Bendahara">Bendahara</option>';
                                            echo '<option value="Admin" selected="">Admin</option>'; 
                                            echo '<option value="Wali Kelas">Wali Kelas</option>';
                                             
                                        }else {
                                            echo '<option value="Bendahara">Bendahara</option>';
                                            echo '<option value="Admin">Admin</option>'; 
                                            echo '<option value="Wali Kelas" selected="">Wali Kelas</option>'; 
                                            
                                        }
                                    ?>
                                </select>    
                            </div>
                        </div>
                        

                    
                    <div class="panel-footer">
                    	<a href="?page=users" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary pull" name="update">Ubah</button><br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
<?php
    endforeach;
?>          


