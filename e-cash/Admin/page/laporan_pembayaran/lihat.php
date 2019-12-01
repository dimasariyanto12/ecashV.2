


<?php
 $idkelas = @$_SESSION['idkelas'];
if(($_POST['nis']=='')) {
    $nis = "";
}
else {
    $nis = " AND tbl_siswa.nis='" . $_POST['nis'] . "'";
}


$id_kelas = " AND tbl_siswa.id_kelas='" . $_POST['id_kelas'] . "'";
$urutkan = "ORDER BY tbl_siswa.nis " .  $_POST['urutkan'];

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
                            
                            <th><center>Total Membayar</center></th>
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
                                            $total_masuk = $total_masuk+$k['nominal'];
                                            $nilai_pembayaran = $p['nominal_pembayaran'];
                                            $sisa_pembayaran = $nilai_pembayaran  - $k['nominal'];
                                            $sisa_pembayaran = $nilai_pembayaran  - $k['nominal'];
                                            if ($sisa_pembayaran<=0) {
                                             $keterangan_pembayaran = '<span class="label label-success">LUNAS</span>';
                                         } 
                                         else if($sisa_pembayaran>0) {
                                            $keterangan_pembayaran = '<span class="label label-danger">BELUM LUNAS</span>';
                                        }

                                        if(($_POST['status_lunas']==$keterangan_pembayaran) OR ($_POST['status_lunas']=='all')){
                                           $query = "SELECT * FROM kas WHERE  id_kelas='$idkelas'" ;
                                           $result1 = $mysqli->getData($query);
                                           
                                           ?>

                                           <tr>
                                            <td align="center"><?= ucfirst($r['nis']); ?></td>
                                            <td><?= ucfirst($r['nama_siswa']); ?></td>
                                            
                                            <td><?= $mysqli->format_rupiah($k['nominal']); ?></td>
                                            <td align="center"><?= $mysqli->format_rupiah($sisa_pembayaran); ?></td>
                                            <td align="center"><?= $keterangan_pembayaran; ?></td>
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
                                <td align="center"><?= ucfirst($r['nis']); ?></td>
                                <td><?= ucfirst($r['nama_siswa']); ?></td>
                                
                                <td align="left">Rp. 0</td>
                                <td align="center"><?= $mysqli->format_rupiah(ucfirst($p['nominal_pembayaran'])); ?></td>
                                <td align="center"><span class="label label-danger" >BELUM LUNAS</span></td>
                            </tr>

                            
                            
                            <?php   
                        }
                    }
                }
            }
            
            ?>


            <?php
            
            foreach ($result1 as $show) {
              
                $total_keluar=$total_keluar+$show['jumlah'];
                

                
            }

            ?>


        </tbody>
        <tr>

            <th colspan="2" style="text-align: center;font-size: 20px">Total Kas Masuk</th>
            <th style="text-align: left;font-size: 17px" ><?php echo "Rp"."&nbsp". number_format( $total_masuk ).",-"?></th></tr>
            <tr>
                <th colspan="2" style="text-align: center;font-size: 20px">Total Kas Keluar</th>
                <th style="text-align: left;font-size: 17px" ><?php echo "Rp"."&nbsp". number_format( $total_keluar ).",-"?></th></tr>
                <tr>
                    <th colspan="2" style="text-align: center;font-size: 20px">Sisa Saldo KAS </th>
                    <th style="font-size: 20px" ><?php echo "Rp"."&nbsp". number_format($total_masuk-$total_keluar ).",-"?></th>
                </tr>
            </table>
            
            <div class="panel-footer">
               <a href="?page=lprn_pembayaran" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>Batal</a>
           </div>
       </div>
   </div>
   <!-- END DEFAULT DATATABLE -->
</div>
</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->

