<!-- Day 6 -->

<?php
include "hak_akses.php";
//Ambil id;
  $id1 =base64_decode($_GET['id']);
  $id2 =base64_decode($id1);
  $id3 =base64_decode($id2);
  $result = $mysqli->getData("SELECT * FROM tbl_jurusan WHERE id_jurusan='$id3'");

  foreach ($result as $show):    

?>

  <?php
  //ubah data jurusan
  $nama_jurusan = "'" . $mysqli->escape_string($_POST['nama_jurusan']) . "'";
  $diskripsi_jurusan = "'" . $mysqli->escape_string($_POST['diskripsi_jurusan']) . "'";
 
  
 ?> 

    <section class="content-header">

  <h1>
   <li class="fa fa-star"> &nbsp;Kompetensi Keahlian</li> |

   <small>SMKN 1 BANGSRI</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
    <li class="#">Kompetensi Keahlian</li>
  <li class="active">Ubah Data Kompetensi Keahlian</li>
</ol>
</section>

<br>


    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal"  method="POST" action="?page=jurusan&aksi=proses" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <br>
                    </div>
                    <div class="panel-body">
            <?php 
            $en1 =base64_encode($id3);
            $en2 =base64_encode($en1);
            $en3 =base64_encode($en2);
            ?>
                        <input type="hidden" class="form-control" name="id_jurusan" required="" value="<?php echo $en3; ?>" />
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Jurusan</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukan Nama Jurusan" required="" value="<?php echo $show['nama_jurusan']; ?>"/>    
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Diskripsi</label>
                            <div class="col-md-6 col-xs-12">   
                                <textarea class="form-control" rows="5" name="diskripsi_jurusan" placeholder="Masukan Diskripsi" required=""><?php echo $show['diskripsi_jurusan']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-footer">
                          <a href="?page=jurusan" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>&nbsp;Batal</a>
                        <button class="btn btn-primary pull" name="update"><i class="fa fa-save"></i>&nbsp;Ubah</button>
                        <br><br>
                    </div>
                </div>
                </form> 
                
            </div>
        </div>                    
        
    </div>


<?php endforeach ?>