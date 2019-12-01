<?php 
      
        include " hak_akses.php";
        $query = "SELECT * from kas ";
        $result = $mysqli->getData($query);

        $qr = "SELECT * from tbl_transaksi ";
        $hasil = $mysqli->getData($qr);

 ?>





        <section class="content-header">
          <h1><i class="fa fa-dollar"></i>
Rekapitulasi KAS |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dollar"></i> Report </a></li>
           
            <li class="active">Rekapitulasi KAS </li>
          </ol>
          <br>
          <div class="page-content-wrap">                

        <div class="row">
            <div class="col-md-12">
                <?= @$_SESSION['status']; 
                    unset($_SESSION['status']);
                ?>
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">                                                      
                             <br>                          
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                   
                                    <th><center> Rekap Kas</center></th>
                                    <th><left>Jumlah</left></th>
                                   
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    
                  foreach ($hasil as $r) {
                 $total1=$total1+$r['nominal_transaksi'];
              }
                    foreach ($result as $show) {
                $total2=$total2+$show['jumlah'];
                
                    }

                    $sisa=$sisa-$total2+$total1;

                                ?>

                                <tr>
                                   
                    <td>Total Saldo Kas Masuk</td>
                    <td><?php echo "Rp"."&nbsp". number_format( $total1 ).",-"?></td>
                    </tr>
                  <tr>
                    <td >Total Saldo Kas Keluar</td>
                    <th ><?php echo "Rp"."&nbsp". number_format( $total2 ).",-"?></th>
                  </tr>
                   <tr>
                    <td>Sisa Saldo</td>
                    <th ><?php echo "Rp"."&nbsp". number_format( $sisa ).",-"?></th>
                  </tr>
              
                                    
                                    
                                </tr>

                                <?php
                                    $i++;
                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>                                
        
    </div>
    <!-- PAGE CONTENT WRAPPER -->



    <?php 

        $query = "SELECT * from kas ";
        $result = $mysqli->getData($query);

        $qr = "SELECT * from tbl_transaksi ";
        $hasil = $mysqli->getData($qr);

 ?>





       