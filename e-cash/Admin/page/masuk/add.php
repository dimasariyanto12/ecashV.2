<?php
       $idkelas = $_SESSION['idkelas'];
    $nis = $_POST['nis'];

    $lihat_kelas = $mysqli->getData("SELECT id_kelas FROM tbl_siswa WHERE nis='". $nis ."'");
    foreach ($lihat_kelas as $lk) {
        $kelas_siswa = $lk['id_kelas'];
    }
    
    $jenis_pembayaran = $_POST['jenis_pembayaran'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $pembayaran = $mysqli->getData("SELECT * FROM tbl_pembayaran WHERE id_kelas='". $idkelas ."'");

    foreach ($pembayaran as $pem) {
       $id_kelas_pembayaran = $mysqli->clean_json($pem['id_kelas']);
    }

    $result = $mysqli->getData("SELECT * FROM tbl_siswa s, tbl_kelas k WHERE s.id_kelas = k.id_kelas AND s.nis='". $nis ."' AND s.id_kelas IN (".$id_kelas_pembayaran.") AND s.id_kelas IN (".$idkelas.")  ");

    if($result==false) {
        ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "NIS Tidak Ditemukan!", type: "error"},
           function(){ 
             document.location='?page=masuk'
           }
        );
      });
    </script>
   

<?php }

    foreach ($result as $r):
?> 
    <!-- START BREADCRUMB -->
   <section class="content-header">
          <h1><i class="fa fa-plus-square"></i>
            Transaksi Kas Masuk
              |<small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Transaksi </a></li>
           
            <li class="active">Kas Masuk</li>
          </ol>
          <br>
         
              
    <!-- END BREADCRUMB -->   

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="?page=masuk&aksi=proses" method="POST" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-9 col-xs-12">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">ID Transaksi</label>
                            <div class="col-md-9 col-xs-12"> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="id_transaksi" placeholder="Masukan ID Transaksi" required="" readonly="" value="<?= $mysqli->kode_transaksi()?>" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nomor Induk Siswa</label>
                            <div class="col-md-9 col-xs-12">
                                <input type="hidden" class="form-control" style="background-color: white; color: black;" name="id_siswa" placeholder="Masukan ID Siswa" required="" value="<?= $r['id_siswa']; ?>" readonly=""/>  
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="nis" placeholder="Masukan Nomor Induk Siswa" required="" value="<?= $r['nis']; ?>" readonly=""/>    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Siswa</label>
                            <div class="col-md-9 col-xs-12"> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="nis" placeholder="Masukan Nomor Induk Siswa" required="" value="<?= $r['nama_siswa']; ?>" readonly="" />    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-9 col-xs-12"> 
                                <?php 
                                $kelas=$mysqli->format_romawi($r['tingkat_kelas']);
                                ?>
                                <input type="text" class="form-control" style="background-color: white; color: black;" value="<?= $kelas." - ".$r['nama_kelas']; ?>" required="" readonly="" />    
                            </div>
                        </div>

                        <div class="form-group hidden">
                            <label class="col-md-3 col-xs-12 control-label">Id Kelas</label>
                            <div class="col-md-9 col-xs-12"> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" value="<?= $r['id_kelas']; ?>" required="" readonly="" name="id_kelas"/>    
                            </div>
                        </div>


                        <?php
                            foreach ($pembayaran as $p) {
                        ?>
                        <div class="form-group" hidden="">
                            <label class="col-md-3 col-xs-12 control-label">Untuk Pembayaran</label>
                            <div class="col-md-9 col-xs-12">
                                <input type="hidden" class="form-control" name="id_pembayaran" placeholder="Masukan Pembayaran" required="" value="<?= $p['id_pembayaran']; ?>" /> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="nama_pembayaran" placeholder="Masukan Pembayaran" required="" value="<?= $p['nama_pembayaran']; ?>" readonly="" />    
                            </div>
                            
                        </div>
                        <div class="form-group " >
                            <label class="col-md-3 col-xs-2 control-label">Pembayaran</label>
                            <div class="col-md-3 col-xs-12">
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="nominal_pembayaran" placeholder="Masukan Nominal Pembayaran" required="" value="<?= $p['nominal_pembayaran']; ?>" readonly="" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-2 control-label">Kurang</label>
                            <div class="col-md-3 col-xs-12">
                                <?php
                                    $kurang = $mysqli->getData("SELECT SUM(nominal_transaksi) as nominal FROM tbl_transaksi WHERE id_siswa='". $r['id_siswa'] ."' AND id_kelas = '". $kelas_siswa ."' AND id_pembayaran='". $p['id_pembayaran'] ."'");

                                    foreach ($kurang as $k) {
                                        $nilai_pembayaran = $p['nominal_pembayaran'];
                                        $pembayaran_kurang = $nilai_pembayaran  - $k['nominal'];
                                    }
                                ?>
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="nominal_pembayaran" placeholder="Masukan Nominal Pembayaran" required="" value="<?= $pembayaran_kurang; ?>" readonly="" />    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Cicilan ke </label>
                            <div class="col-md-3 col-xs-12"> 
                                <?php
                                    $siswa = $r['id_siswa'];
                                    $id_kelas = $r['id_kelas'];
                                    $idpembayaran = $_POST['jenis_pembayaran'];
                                ?>
                                <input type="number" class="form-control" style="background-color: white; color: black;" name="jumlah_cicilan" placeholder="Masukan Jumlah Cicilan" required="" value="<?= $mysqli->kode_cicilan($siswa, $id_kelas, $idpembayaran)?>" readonly="" />    
                            </div>
                            <label class="col-md-2 col-xs-12 control-label">Maksimal cicilan
                            </label>
                            <div class="col-md-3 col-xs-12"> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="batas_cicilan" placeholder="Masukan Batas Cicilan" required="" value="<?= $p['jumlah_cicilan']; ?>x" readonly=""/>    
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="form-group" hidden="">
                            <label class="col-md-3 col-xs-12 control-label">Metode Pembayaran</label>
                            <div class="col-md-9 col-xs-12"> 
                                <input type="text" class="form-control" style="background-color: white; color: black;" name="pembayaran_melalui" required="" value="<?= strtoupper($metode_pembayaran); ?>" readonly="" />
                            </div>
                        </div>
                        <?php
                        if((strtoupper($metode_pembayaran))=='TRANSFER') {
                        ?>
                        <div class="form-group" >
                            <label class="col-md-3 col-xs-12 control-label">Bukti Transfer</label>
                            <div class="col-md-9 col-xs-12"> 
                                <input type="file" accept='image/*' class="fileinput btn-primary" name="fupload" title="Browse file" id="bukti_transfer" required="" />
                            </div>
                        </div>

                        <?php
                            } 
                        ?> 

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nominal Pembayaran</label>
                            <div class="col-md-9 col-xs-12"> 
                                <select class="form-control select" name="nominal_transaksi" id="nominal_transaksi"   required="">

                                    <option value="" >Pilih Nominal</option>  
                                    <option value="1000">Rp.1.000</option>
                                    <option value="3000">Rp.3.000</option>

                                </select>    

                               <!--  <input type="text" class="form-control" style="background-color: white; color: black; font-size: 30pt; height:100px;" name="nominal_transaksi" placeholder="0" required="" autofocus="" id="nominal_transaksi" onkeyup="convertToRupiah(this);"/>     -->
                            </div>
                        </div>
                         <center>
                            <?php
                                if($pembayaran_kurang<=0) {
                                    echo '<h1 style="color: green;"><b>LUNAS</b></h1>';
                                }
                                else {
                                    echo '<h3 style="color: red;"><b>BELUM LUNAS</b></h3';
                                }
                            ?>

                            </center>
                        
                        </div>
                        <div class="col-md-3">
                           <br/>
                           <!--  <p>Jumlah Pembayaran :</p>
                            <h3 style="color: blue;"><b><?= $mysqli->format_rupiah($nilai_pembayaran); ?></b></h3>
                            <p>Sisa Pembayaran:</p>
                            <h3 style="color: blue;"><b><?= $mysqli->format_rupiah($pembayaran_kurang); ?></b></h3>
                            <p style="margin-bottom: -10px;">Status Pembayaran :</p> -->

                           
                        </div>
                    </div>

                    <?php
                        if($pembayaran_kurang<=0) {
                            echo "<script>
                                document.getElementById('nominal_transaksi').readOnly = true;
                                document.getElementById('bukti_transfer').disabled = true;
                                </script>";
                        } else {
                    ?>
                    <div class="panel-footer">
                        <a href="?page=masuk" class="btn btn-danger  "><i class="fa fa-arrow-circle-left"></i>Batal</a>&nbsp;
                        <button class="btn btn-primary  " name="bayar"><i class="fa fa-dollar"></i>&nbsp;Bayar</button><br><br>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                </form>
                
                

              


                
                          
        
    </div>
<script type="text/javascript">
    function convertToRupiah(objek) {
      separator = ".";
      a = objek.value;
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length;
      j = 0;
      for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
          c = b.substr(i-1,1) + separator + c;
        } else {
          c = b.substr(i-1,1) + c;
        }
      }
      objek.value = c;

    } 
</script>
                                         
<?php
    endforeach;
  

?>          


