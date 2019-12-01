


<center>
  <div class="col-md-12">
    <!-- Application buttons -->
    <div class="box box-success">
      <div class="box-header">
        <h3 class="box-title">CEK PEMBAYARAN KAS SISWA  </h3>
      </div>

      <div class="box-body">
       <form method="POST">
                      
                    </div>
                    <div class="modal-body">
                      <div class="form-group" hidden="">                          
                        <div class="col-md-6 col-xs-12"> 
                          <select class="form-control select" name="id_pembayaran">
                          
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

                      <input type="number" name="nis" class="form-control" placeholder="MASUKKAN NOMER INDUK SISWA" autocomplete="" required=""  >

                      <div class="form-group" hidden=""  >
                        <select class="form-control select" name="id_kelas" required="">
                          <option value="all">~~~~~~ SEMUA KELAS ~~~~~~</option>
                          <?php
                          $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas WHERE id_user");

                          foreach ($query_kelas as $qk) {
                            ?>      
                            
                            <option value="<?= $qk['id_kelas']; ?>"><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                            <?php
                          }
                          ?>
                        </select>     
                      </div>


                      <div class="form-group" hidden="" >
                        <select class="form-control select" name="status_lunas" required="">
                          
                          <option value="all">Semua</option>
                          <option value="LUNAS">Lunas</option>
                          <option value="BELUM LUNAS">Belum Lunas</option>
                        </select>    
                      </div>
                   
                     <br> 
                      <button autofocus="" type="submit"  value="Cari" class="btn btn-primary">Cari </button>
                    </form>
                  </div>
      </div>
      <!-- /.box-body -->

      <!-- SCAN NIS-->
      <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> </h4>
              </div>
              <div class="modal-body">
                <p align="center">Maaf Fitur Ini Masih dalam Tahap Pengembangan</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="modal-kelas">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <form method="post">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" align="center" >Pembayaran Satu Kelas </h4>
                  </div>
                  <div class="modal-body">
                    
                    <div class="form-group" hidden="">                          
                      <div class="col-md-6 col-xs-12"> 
                        <select class="form-control select" name="id_pembayaran">
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
                    <div class="form-group"  >
                      <select class="form-control select" name="id_kelas" required="">
                        <option value="all">~~~~~~ SEMUA KELAS ~~~~~~</option>
                        <?php
                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas WHERE id_user");

                        foreach ($query_kelas as $qk) {
                          ?>      
                          
                          <option value="<?= $qk['id_kelas']; ?>"><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                          <?php
                        }
                        ?>
                      </select>     
                    </div>



                    <div class="form-group" hidden="" >


                      <select class="form-control select" name="status_lunas" required="">
                        
                        <option value="all">Semua</option>
                        <option value="LUNAS">Lunas</option>
                        <option value="BELUM LUNAS">Belum Lunas</option>
                      </select>    
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" value="Cari" class="btn btn-primary">Cari </button>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
          <?php

          if(($_POST['nis']=='')) {
            $nis = "";
          }
          else {
            $nis = " AND tbl_siswa.nis='" . $_POST['nis'] . "'";
          }


          
          if($_POST['id_kelas']=='all') {
            $id_kelas = "";
          }
          else {
            $id_kelas = " AND tbl_siswa.id_kelas='" . $_POST['id_kelas'] . "'";
          }

          ?>      
          
          <center>
            <div  class="page-content-wrap" >                

              <div class="center">
                <div class="col-md-12">
                  <!-- START DEFAULT DATATABLE -->
                                                 
                      <br>
                      
                    </div>
                    
  
                          <?php
                          if($_POST['id_pembayaran']=='all') {
                            $pembayaran = $mysqli->getData("SELECT * FROM tbl_pembayaran"); 
                          } else {
                            $pembayaran = $mysqli->getData("SELECT * FROM tbl_pembayaran WHERE id_pembayaran='". $_POST['id_pembayaran'] ."'");
                          }

                          foreach ($pembayaran as $p) {
                            $id_kelas_pembayaran = $mysqli->clean_json($p['id_kelas']);
                            $query = "SELECT * FROM tbl_siswa INNER JOIN tbl_kelas ON tbl_kelas.id_kelas = tbl_siswa.id_kelas WHERE tbl_siswa.foto_siswa <> 'sdjhashahsghdvhhdbagusgantengamatbshdhavhs' $id_kelas $nis  AND tbl_siswa.id_kelas IN (". $id_kelas_pembayaran .") "; 
                            $result = $mysqli->getData($query);
                            if($result==false) {
                              ?>
                              <script type="text/javascript">
                                $( document ).ready(function() {
                                  swal({title: "Maaf!", text: "NIS Tidak Terdaftar!", type: "error"},
                                    function(){ 
                                      document.location='?page=cek_pembayaran'
                                    }
                                    );
                                });
                              </script>
                              

                            <?php } 

                            

                            
                            foreach ($result as $r) {
                              $transaksi = $mysqli->getData("SELECT * FROM tbl_transaksi WHERE id_siswa='". $r['id_siswa'] ."' AND id_pembayaran='". $p['id_pembayaran'] ."' GROUP BY id_pembayaran");

                              if(!empty($transaksi)) {
                                foreach ($transaksi as $t) {
                                  $kurang = $mysqli->getData("SELECT SUM(nominal_transaksi) as nominal FROM tbl_transaksi WHERE id_siswa='". $r['id_siswa'] ."' AND id_kelas='". $r['id_kelas'] ."' AND id_pembayaran='". $p['id_pembayaran'] ."'");
                                  foreach ($kurang as $k) {
                                    $nilai_pembayaran = $p['nominal_pembayaran'];
                                    $sisa_pembayaran = $nilai_pembayaran  - $k['nominal'];
                                    if ($sisa_pembayaran<=0) {
                                      $keterangan_pembayaran = '<span class="label label-success">LUNAS</span>';
                                    } 
                                    else if($sisa_pembayaran>0) {
                                      $keterangan_pembayaran = '<span class="label label-danger">BELUM LUNAS</span>';
                                    }

                                    if(($_POST['status_lunas']==$keterangan_pembayaran) OR ($_POST['status_lunas']=='all')){
                                      
                                      ?>

                                      

                                      <?php
                                    }
                                  }
                                }
                              }
                              else {

                                if(($_POST['status_lunas']<>'LUNAS')){
                                  ?>
                                 

                                  <?php 
                                }
                              }
                            }
                          }
                          ?>

                   <div class="col-md-12">
          <p class="lead"><b>Detail Pembayaran</b></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">NIS</th>
                <td>:<?= ucfirst($r['nis']); ?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>: <?= ucfirst($r['nama_siswa']); ?></td>
              </tr>
              <tr>
                <th>Pembayaran</th>
                <td>: <?= ucfirst($p['nama_pembayaran']); ?> (<?= $mysqli->format_rupiah(ucfirst($p['nominal_pembayaran'])); ?>)</td>
              </tr>
              <tr>
                <th>Telah Membayar</th>
                <td>: <?= $mysqli->format_rupiah($k['nominal']); ?></td>
              </tr>
                <tr>
                <th>Sisa Pembayaran</th>
                <td>: <?= $mysqli->format_rupiah($sisa_pembayaran); ?></td>
              </tr>
                <tr>
                <th>Status</th>
                <td>: <?= $keterangan_pembayaran; ?></td>
              </tr>
              

            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
                    </div>
                  </div>
                  <!-- END DEFAULT DATATABLE -->
                </div>
              </div>                                
              
            </div>
          </div>

 <!-- /.col -->
       


      <!-- END TYPOGRAPHY -->

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <form method="POST">
                      <h4 class="modal-title" align="right">Cek Pembayaran Siswa</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">                          
                        <div class="col-md-6 col-xs-12"> 
                          <select class="form-control select" name="id_pembayaran">
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

                      <input type="number" name="nis" class="form-control" placeholder="MASUKKAN NOMER INDUK SISWA" autocomplete="" required=""  >
                      <div class="form-group" hidden=""  >
                        <select class="form-control select" name="id_kelas" required="">
                          <option value="all">~~~~~~ SEMUA KELAS ~~~~~~</option>
                          <?php
                          $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas WHERE id_user");

                          foreach ($query_kelas as $qk) {
                            ?>      
                            
                            <option value="<?= $qk['id_kelas']; ?>"><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                            <?php
                          }
                          ?>
                        </select>     
                      </div>



                      <div class="form-group"  >


                        <select class="form-control select" name="status_lunas" required="">
                          
                          <option value="all">Semua</option>
                          <option value="LUNAS">Lunas</option>
                          <option value="BELUM LUNAS">Belum Lunas</option>
                        </select>    
                      </div>
                      <br>
                      <p>Pilih Cari</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <button type="submit"  value="Cari" class="btn btn-primary">Cari </button>
                    </form>
                  </div>
                </div>

