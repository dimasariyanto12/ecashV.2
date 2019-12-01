<?php
 

if(!empty($_SESSION['kodeakses'])) {
    $id = $id_user;
    $result = $mysqli->getData("SELECT * FROM tbl_user WHERE id_user='$id'");
    foreach ($result as $r): 

?> 
       
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal" action="?page=akun&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Akun</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nomor Induk user</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nip" placeholder="Masukan Nomor Induk user" required="" value="<?= $r['nip']; ?>" onkeypress="return isNumberKey(event)" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
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
                            <label class="col-md-3 col-xs-12 control-label">Telepon</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="telp_user" placeholder="Masukan Nomor Telepon" required="" value="<?= $r['telp_user']; ?>" onkeypress="return isNumberKey(event)"/>    
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="email" class="form-control" name="email_user" placeholder="Masukan Email user" required="" value="<?= $r['email_user']; ?>"/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="password" class="form-control" name="password_user" placeholder="Masukan Password Jika Ingin Mengganti"/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Konfirmasi Password</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="password" class="form-control" name="repassword_user" placeholder="Silahkan Konfirmasi Password"/>    
                            </div>
                        </div>
                    </div>

                    
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right" name="update">Ubah</button>
                        <br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
<?php

    endforeach;
    
}

?>          

