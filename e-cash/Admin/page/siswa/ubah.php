<?php  

include "hak_akses.php";
 $id1 =base64_decode($_GET['id']);
  $id2 =base64_decode($id1);
  $id3 =base64_decode($id2);
    $result = $mysqli->getData("SELECT * FROM tbl_siswa WHERE id_siswa='$id3'");

   
    foreach ($result as $r):    


      //update

  $nis = "'" . $mysqli->escape_string($_POST['nis']) . "'";
  $nama_siswa = "'" . $mysqli->escape_string($_POST['nama_siswa']) . "'";
  $jekel_siswa = "'" . $mysqli->escape_string($_POST['jekel_siswa']) . "'";
  $alamat_siswa = "'" . $mysqli->escape_string($_POST['alamat_siswa']) . "'";
  $id_kelas   = "'" . $mysqli->escape_string($_POST['id_kelas']) . "'";


  if (isset($_POST['update'])) {
   $idj1 =base64_decode($_POST['id_siswa']);
  $idj2 =base64_decode($idj1);
  $idj3 =base64_decode($idj2);
  $id_siswa   = "'" . $mysqli->escape_string($idj3) . "'";
    
  
  
  $result = $mysqli->execute("UPDATE tbl_siswa SET nis = $nis,nama_siswa = $nama_siswa,jekel_siswa = $jekel_siswa,
        alamat_siswa = $alamat_siswa,id_kelas  = $id_kelas
      WHERE 
        id_siswa    = $id_siswa
    ");
  
  if($result) {
    $mysqli->getHistory("Mengubah Kelas " . $_POST['nama_kelas']);
   echo '<div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Selamat !</strong> Data berhasil diubah
      </div>';

    } else {
   echo '<div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Gagal !</strong> Data gagal disimpan, mungkin data yang anda masukan salah
      </div>';
  }
 ?>

                                  <script type="text/javascript">
                                    window.location.href="?page=siswa";
                                 </script>

 <?php
}
?> 
    
    <section class="content-header">
      <h1> <li class="fa  fa-edit"> 
         Form Ubah Siswa |
        <small>SMKN 1 BANGSRI</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
        <li><a href="#">Data Siswa</a></li>
        <li class="active">Ubah Data Siswa </li>
      </ol>
    </section>
    <br>

   <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal"  method="POST" action="?page=siswa&aksi=proses" enctype="multipart/form-data">
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
                        <input type="hidden" class="form-control" name="id_siswa" required="" value="<?= $en3; ?>" />
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nomor Induk Siswa</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="number" class="form-control" name="nis" placeholder="Masukan Nomor Induk Siswa" required="" value="<?= $r['nis']; ?>" onkeypress="return isNumberKey(event)" />    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                            <div class="col-md-6 col-xs-12"> 
                                <input type="text" class="form-control" name="nama_siswa" placeholder="Masukan Nama Lengkap Siswa" required="" value="<?= $r['nama_siswa']; ?>"/>    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="jekel_siswa">
                                    <?php 
                                        if($r['jekel_siswa']=='Laki-Laki') { 
                                            echo '<option value="Laki-Laki" selected="">Laki-Laki</option>';
                                            echo '<option value="Perempuan">Perempuan</option>'; 
                                             
                                        } else {
                                            echo '<option value="Laki-Laki">Laki-Laki</option>';
                                            echo '<option value="Perempuan" selected="">Perempuan</option>'; 
                                            
                                        }
                                    ?>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat Lengkap</label>
                            <div class="col-md-6 col-xs-12">   
                                <textarea class="form-control" rows="5" name="alamat_siswa" placeholder="Masukan Alamat Lengkap Siswa" required=""><?= $r['alamat_siswa']; ?></textarea>
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Kelas</label>
                            <div class="col-md-6 col-xs-12"> 
                                <select class="form-control select" name="id_kelas">
                                  
                                    <?php
                                        $query_kelas = $mysqli->getData("SELECT * FROM tbl_kelas ORDER BY tingkat_kelas ASC");

                                        foreach ($query_kelas as $qk) {
                                    ?>
                                            <option value="<?= $qk['id_kelas']; ?>" <?php if($r['id_kelas']==$qk['id_kelas']) { echo "selected=''"; } ?>><?= $mysqli->format_romawi($qk['tingkat_kelas']); ?> <?= $qk['nama_kelas']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>    
                            </div>
                        </div>
                        
                       
                        </div>
                  
                    
                    <div class="panel-footer">
                      <a href="?page=siswa" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i>Batal</a>
                        <button class="btn btn-primary pull" name="update"><i class="fa fa-save"></i>&nbsp;Ubah</button>
                        <br><br>
                    </div>
                </div>
                </form>
                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->                                                
<?php
    endforeach;
 
  

?>          