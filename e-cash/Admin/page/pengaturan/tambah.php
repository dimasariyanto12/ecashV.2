<?php

  include "hak_akses.php";

      
?> 

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">                
                <form class="form-horizontal" action="?page=pengaturan&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $page; ?></h3>
                    </div>
                    <div class="panel-body">
                       
                       
                        

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_pembayaran" placeholder="Masukkan Nama Pembayaran" required=""  />    
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jumlah Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nominal_pembayaran" placeholder="Masukan Nominal Pembayaran" required="" value="<?= $mysqli->format_ribuan($r['nominal_pembayaran']); ?>" onkeyup="convertToRupiah(this);" />    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jumlah Cicilan</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="jumlah_cicilan" placeholder="Masukan Jumlah Cicilan" required="" value="<?= ($r['jumlah_cicilan']); ?>" onkeyup="convertToRupiah(this);"/>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_kelas" required="">
                                     <option>~~~~~~Pilih Kelas~~~~~~</option>
                                    <?php
                                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas where status='0'");

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
                        <a href="?page=pengaturan" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary " name="simpan">Simpan</button><br><br>

                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>

