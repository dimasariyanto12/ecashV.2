       <?php 

       include "hak_akses.php";
      $idkelas = $_SESSION['idkelas'];
       $query = "SELECT * FROM kas, tbl_kelas WHERE kas.id_kelas = tbl_kelas.id_kelas AND kas.id_kelas IN (".$idkelas.") ";
       $result = $mysqli->getData($query);


  $id_keluar = "'" . @$_POST['id_keluar'] . "'";
$keterangan = "'" . @$mysqli->escape_string($_POST['keterangan']) . "'";
$tanggal = "'" . @$mysqli->escape_string($_POST['tanggal']) . "'";
$jumlah = "'" . @$_POST['jumlah'] . "'";
$id_kelas   = "'" . @$mysqli->escape_string($_POST['id_kelas']) . "'";


if(isset($_POST['simpan'])) {
  $result = $mysqli->execute("
    INSERT INTO kas(id_keluar,keterangan,tanggal,jumlah,id_kelas)VALUES($id_keluar,$keterangan,$tanggal,$jumlah,$idkelas)");
$mysqli->getHistory("Menambahkan Pengeluaran Kas " . $_POST['jumlah']);
  if($result) {
   

  ?>
   <script type="text/javascript">
          $( document ).ready(function() {
            swal({title: "Selamat!", text: " Pengeluaran  berhasil Di Tambahkan!", type: "success"},
               function(){ 
                 document.location='?page=keluar'
               }
            );
          });
        </script>
      <?php 
            
        }
        else{
    ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Pengeluaran  gagal Di Di Tambahkan!", type: "error"},
           function(){ 
             document.location='?page=keluar'
           }
        );
      });
    </script>
   


  <?php
}
}

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
        <div class="box box-default">
          <div class="box-header">
            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
              <i class="fa fa-plus">
               Tambah Data
             </i>
           </button>
           <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>

                  <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                     $i=1;
                     foreach ($result as $show) {
                      
                    $total1=$total1+$show['nominal_transaksi'];
                    $total2=$total2+$show['jumlah'];
                    $sisa=$sisa-$total1-$total2;

                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $show['id_keluar']; ?></td>
                      <td><?= $mysqli->format_romawi(ucfirst($show['tingkat_kelas'])); ?> <?= ucfirst($show['nama_kelas']); ?></td>
                      <td><?php echo $show['tanggal']; ?></td>
                      <td><?php echo $show['keterangan']; ?></td>
                      <td align="right"><?php echo"Rp"."&nbsp".$show['jumlah'];?></td>
                    </tr>
                    <?php   

                      $i++;
                  } ?>
                   </tbody>

                  

               

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
                        <input class="form-control" type="text" rows="3" name="id_keluar" readonly="" value="<?= $mysqli->kode_keluar()?>"  />
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
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Uang"  required="" />  
                      </div>



                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                      <button class="btn btn-success notika-btn-success"  name="simpan" >Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
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