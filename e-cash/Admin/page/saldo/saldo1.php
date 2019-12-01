<?php 


// tabel1=jumlah
// tabel2=nominal_transaksi
// tabel1=kas
// tabel2=tbl_transaksi
// SELECT tabel1.*, tabel2.* FROM tabel1, tabel2
// WHERE tabel1.PK=tabel2.FK;
		    $query = "SELECT * from kas ";
        $result = $mysqli->getData($query);

        $qr = "SELECT * from tbl_transaksi ";
        $hasil = $mysqli->getData($qr);


 ?>


 	<section class="content-header">
        <h1><i class="fa fa-money"></i>
          Kas Keluar |
          <small>SMKN 1 BANGSRI</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-money"></i> Transaksi </a></li>

          <li class="active">Kas Keluar</li>
        </ol>
        <br>
        <div class="box box-success">
          <div class="box-header">
            
           <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>

              
                </thead>
                <tbody>

                  <?php

                  foreach ($hasil as $r) {
                 $total1=$total1+$r['nominal_transaksi'];
              }
                    foreach ($result as $show) {
                $total2=$total2+$show['jumlah'];
                
                    }

                    $sisa=$sisa-$total2+$total1;


                  ?>
                   
                   </tbody>

                  <tr>
                    <th colspan="4" style="text-align: center;font-size: 20px">Total Saldo Kas Masuk</th>
                    <th style="text-align: right;font-size: 17px" ><?php echo "Rp"."&nbsp". number_format( $total1 ).",-"?></th>
                  </tr>
                   <tr>
                    <th colspan="4" style="text-align: center;font-size: 20px">Total Saldo Kas Keluar</th>
                    <th style="text-align: right;font-size: 17px" ><?php echo "Rp"."&nbsp". number_format( $total2 ).",-"?></th>
                  </tr>
                   <tr>
                    <th colspan="4" style="text-align: center;font-size: 20px">Sisa Saldo</th>
                    <th style="text-align: right;font-size: 17px" ><?php echo "Rp"."&nbsp". number_format( $sisa ).",-"?></th>
                  </tr>
                 
               

              </table>
            </div>


            <!--  Halaman Tambah-->
            <div class="panel-body">

              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"> Tambah Data Pengeluaran
                      </h4>
                    </div>
                    <div class="modal-body">

                     <form role="form" method="POST">



                      <div class="form-group">
                        <label>ID Transaksi</label>
                        <input class="form-control" rows="3" name="id_keluar" ></input>  
                      </div>

                    
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Input Kode" />  
                      </div>

                        <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan"placeholder=" Keterangan" ></textarea>  
                      </div>


                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Uang" />  
                      </div>



                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                      <button class="btn btn-success notika-btn-success"  name="simpan" >Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            