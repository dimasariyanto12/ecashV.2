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

<!-- START BREADCRUMB -->
<section class="content-header">
  <h1><i class="fa fa-credit-card"></i>
    Laporan Pembayaran Siswa  |
    <small>SMKN 1 BANGSRI</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-credit-card"></i> Report </a></li>
    
    <li class="active">Laporan Pembayaran Siswa </li>
  </ol>
  <br>
  <!-- END BREADCRUMB -->    
  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">                

    <div class="row">
      <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
          <div class="panel-heading">                                
           <br>
           
         </div>
         <div class="panel-body table-responsive">
          <table class="table datatable" id="pembayaran">
            <thead>
              <tr>
                <th><center>NIS</center></th>
                <th><center>Nama</center></th>
                <th><center>Nama Pembayaran</center></th>
                <th><center>Total Pembayaran</center></th>
                <th><center>Sisa Pembayaran</center></th>
                <th><center>Status</center></th>
              </tr>
            </thead>
            <tbody>
              
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
                foreach ($result as $r) {
                  $transaksi = $mysqli->getData("SELECT * FROM tbl_transaksi WHERE id_siswa='". $r['id_siswa'] ."' AND id_pembayaran='". $p['id_pembayaran'] ."' GROUP BY id_pembayaran");

                  if(!empty($transaksi)) {
                    foreach ($transaksi as $t) {
                      $kurang = $mysqli->getData("SELECT SUM(nominal_transaksi) as nominal FROM tbl_transaksi WHERE id_siswa='". $r['id_siswa'] ."' AND id_kelas='". $r['id_kelas'] ."' AND id_pembayaran='". $p['id_pembayaran'] ."'");
                      foreach ($kurang as $k) {
                        $nilai_pembayaran = $p['nominal_pembayaran'];
                        $sisa_pembayaran = $nilai_pembayaran  - $k['nominal'];
                        if ($sisa_pembayaran<=0) {
                         $keterangan_pembayaran = "LUNAS";
                       } 
                       else if($sisa_pembayaran>0) {
                        $keterangan_pembayaran = "BELUM LUNAS";
                      }

                      if(($_POST['status_lunas']==$keterangan_pembayaran) OR ($_POST['status_lunas']=='all')){
                        
                        ?>

                        <tr>
                          <td><?= ucfirst($r['nis']); ?></td>
                          <td><?= ucfirst($r['nama_siswa']); ?></td>
                          <td><?= ucfirst($p['nama_pembayaran']); ?> (<?= $mysqli->format_rupiah(ucfirst($p['nominal_pembayaran'])); ?>)</td>
                          <td><?= $mysqli->format_rupiah($k['nominal']); ?></td>
                          <td><?= $mysqli->format_rupiah($sisa_pembayaran); ?></td>
                          <td><?= $keterangan_pembayaran; ?></td>
                        </tr>

                        <?php
                      }
                    }
                  }
                }
                else {

                 if(($_POST['status_lunas']<>'LUNAS')){
                  ?>

                  <tr>
                    <td><?= ucfirst($r['nis']); ?></td>
                    <td><?= ucfirst($r['nama_siswa']); ?></td>
                    <td><?= ucfirst($p['nama_pembayaran']); ?> (<?= $mysqli->format_rupiah(ucfirst($p['nominal_pembayaran'])); ?>)</td>
                    <td>Rp. 0</td>
                    <td><?= $mysqli->format_rupiah(ucfirst($p['nominal_pembayaran'])); ?></td>
                    <td>BELUM LUNAS</td>
                  </tr>

                  <?php 
                }
              }
            }
          }
          ?>
          





        </tbody>
      </table>
      <div class="panel-footer">
       <a href="?page=cek_pembayaran" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>&nbsp;Kembali</a>
     </div>
   </div>
 </div>
 <!-- END DEFAULT DATATABLE -->
</div>
</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->

<!-- 

<div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
          
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>

                <tr>
                  <td>NIS</td>
                  <td><?= ($r['nis']); ?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><?= ($r['nama_siswa']); ?></td>
                </tr>
                <tr>
                  <td>Pembayaran</td>
                  <td><?= ($p['nama_pembayaran']); ?> (<?= $mysqli->format_rupiah(($p['nominal_pembayaran'])); ?>)</td>
                </tr>
                <tr>
                  <td>Telah Membayar</td>
                  <td><?= $mysqli->format_rupiah($k['nominal']); ?></td>          
                </tr>
                <tr>
                  <td>Sisa Pembayaran</td>
                  <td><?= $mysqli->format_rupiah($sisa_pembayaran); ?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?= $keterangan_pembayaran; ?></td>
                </tr>
              </table>
            </div>
          
          </div>
        
        </div>
      </div> -->