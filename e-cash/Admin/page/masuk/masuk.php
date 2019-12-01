          <?php
      $idkelas = @$_SESSION['idkelas'];
    $nis = @$_POST['nis'];
    include 'hak_akses.php';
     @$idkelas = @$_SESSION['idkelas'];
    $query = "SELECT * FROM tbl_transaksi t, tbl_siswa s , tbl_user p, tbl_pembayaran pn, tbl_kelas k WHERE t.id_siswa = s.id_siswa   AND t.id_user = p.id_user AND t.id_pembayaran = pn.id_pembayaran AND t.id_kelas = k.id_kelas  AND s.id_kelas IN (".$idkelas.")  ORDER BY t.id_transaksi DESC";
    $result = $mysqli->getData($query);
    ?>


        <section class="content-header">
          <h1><i class="fa fa-money"></i>
            Kas Masuk
              |<small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-money"></i> Transaksi </a></li>
           
            <li class="active">Kas Masuk</li>
          </ol>
          <br>
          <div class="box box-success">
            <div class="box-header">   
           
    
            
            <button class="btn btn-info btn-lg" data-toggle="collapse" data-target="#pembayaran"><i class='fa fa-plus'></i> Tambah Transaksi</button><br/><br/>

                <form class="form-horizontal collapse" action="?page=masuk&aksi=add" method="POST" enctype="multipart/form-data" id="pembayaran">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transaksi Pembayaran</h3>
                    </div>
                    <div class="panel-body">
                        
                        <div class="form-group" >
                            <label class="col-md-3 col-xs-12 control-label">Nomor Induk Siswa</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nis" placeholder="Masukan Nomor Induk Siswa" required="" onkeypress="return isNumberKey(event)" />    
                            </div>
                        </div>

                        <div class="form-group" hidden="">
                            <label class="col-md-3 col-xs-12 control-label">Untuk Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="jenis_pembayaran" data-live-search="true">
                                <?php
                                    $query_pembayaran = $mysqli->getData("SELECT * FROM tbl_pembayaran WHERE aktif_pembayaran='1' ORDER BY id_pembayaran DESC");
                                    foreach ($query_pembayaran as $qp) {
                            
                                    echo "<option value='". $qp['id_pembayaran'] ."'>". $qp['nama_pembayaran'] ."</option>";
                                    }
                                ?>

                                </select>    
                            </div>
                        </div>

                        <div class="form-group" hidden="">
                            <label class="col-md-3 col-xs-12 control-label">Metode Pembayaran</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="metode_pembayaran">
                                    <option value="Tunai">Tunai</option>
                                    
                                </select>    
                            </div>
                        </div>
                    </div>

                    
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right" name="simpan">Tambah</button><br><br>
                    </div>
                </div>
                </form>

                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Riwayat Pembayaran</h3>
                        
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>No</th>                    
                                    <th>Nama Siswa</th>
                                                         
                                    <th>Nominal</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach ($result as $r) {
                                    $kelas=$mysqli->format_romawi($r['tingkat_kelas']);
                                ?>

                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= ucfirst($r['nama_siswa']); ?></td>
                                   
                                  
                                    <td><?= $mysqli->format_rupiah($r['nominal_transaksi']); ?></td>
                                    <td align="center">
                                    <?php 
                                        $enidtransaksi1=base64_encode($r['id_transaksi']);
                                        $enidtransaksi2=base64_encode($enidtransaksi1);
                                        $enidtransaksi3=base64_encode($enidtransaksi2);
                                        
                                        $enidsiswa1=base64_encode($r['id_siswa']);
                                        $enidsiswa2=base64_encode($enidsiswa1);
                                        $enidsiswa3=base64_encode($enidsiswa2);
                                        

                                        $enidkelas=base64_encode(base64_encode(base64_encode($r['id_kelas'])));

                                        $enidpembayaran1=base64_encode($r['id_pembayaran']);
                                        $enidpembayaran2=base64_encode($enidpembayaran1);
                                        $enidpembayaran3=base64_encode($enidpembayaran2);
                                        
                                        $encicilan1=base64_encode($r['cicilan_transaksi']);
                                        $encicilan2=base64_encode($encicilan1);
                                        $encicilan3=base64_encode($encicilan2);
                                    ?>
                                        
                                    </td>
                                </tr>

                                <?php
                                    $i++;
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                                         
        </div>
    