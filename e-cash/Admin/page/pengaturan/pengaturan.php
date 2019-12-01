<?php
  
    include "hak_akses.php";
    $query = "SELECT * FROM tbl_pembayaran ORDER BY id_pembayaran DESC";
    $result = $mysqli->getData($query);

// Jika Sudah Login
   
?>      
    <section class="content-header">
        <h1><i class="fa fa-gear"></i>
         Pengaturan |
          <small>SMKN 1 BANGSRI</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-gear"></i> Pengaturan </a></li>

          <li class="active">Pembayaran</li>
        </ol>
        <br>

    <div class="page-content-wrap">                

        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">                                                     
                      <h4>Pengaturan Pembayaran</h4>                                                      
                    </div>
                    <div class="panel-heading">                                 
                    <a href="?page=pengaturan&aksi=tambah" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Pembayaran</a>      
                </div>  
                    <div class="panel-body table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <?php $i=1; ?>
                                     <th>No</th>
                                     <th><center>Nama Pembayaran</center></th>
                                    <th><center>Jumlah Pembayaran</center></th>
                                    <th><center>Jumlah Cicilan</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    foreach ($result as $r) {
                                ?>

                                <tr>

                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $r['nama_pembayaran']; ?></td>
                                    <td align="center"><?= $mysqli->format_rupiah(ucfirst($r['nominal_pembayaran'])); ?></td>
                                    <td  align="center"><?= ucfirst($r['jumlah_cicilan']); ?> x</td>
                                    
                                    <td align="center">
                                        <?php   
                                            $id1 =base64_encode($r['id_pembayaran']);
                                            $id2 =base64_encode($id1);
                                            $id3 =base64_encode($id2);
                                        ?>
                                        <a href="?page=pengaturan&aksi=ubah&id=<?= $id3; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>|  
                                         <a href="?page=pengaturan&aksi=hapus&id=<?= $id3; ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus data Pembayaran ini?')"><i class="fa fa-times"></i></a>                                      
                                      
                                      
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
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>                                
        
    </div>
    <!-- PAGE CONTENT WRAPPER -->

