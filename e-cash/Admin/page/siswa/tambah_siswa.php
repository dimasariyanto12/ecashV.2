
        <?php 

include "hak_akses.php";
 
 ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <li class="fa fa-plus-square">  Tambah Data Siswa </li>
         <b>|</b>
        <small>SMKN 1 BANGSRI</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Data Master</a></li>
        <li><a href="#">Data Siswa</a></li>
        <li class="active">Tambah Siswa </li>
      </ol>
    </section>
    <br>


   
    <!-- Main content -->
  <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal"  method="POST" action="?page=siswa&aksi=proses" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <br>
                    </div>
                    <div class="panel-body">
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nomor Induk Siswa</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nis" placeholder="Masukkan Nomor Induk Siswa" required=""/>    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama Lengkap Siswa" required=""/>    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="jekel_siswa" required="">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap</label>
                            <div class="col-md-6 col-xs-12">   
                                <textarea class="form-control" rows="5" name="alamat_siswa" placeholder="Masukkan Alamat Lengkap Siswa" required=""></textarea>
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


                    
                    <div class="panel-footer">
                       <a href="?page=siswa" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>Batal</a>
                        <button class="btn btn-primary " name="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button><br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>


