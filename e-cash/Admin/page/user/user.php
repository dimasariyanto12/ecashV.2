  
  <?php 

    include "hak_akses.php";
    $query = "SELECT * FROM tbl_pegawai ORDER BY id_pegawai DESC";
    $result = $mysqli->getData($query);


   ?>





   <section class="content-header">
          <h1><i class="fa fa-user-plus"> &nbsp;</i>Data User |
              <small>SMKN 1 BANGSRI</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user-plus"></i> Data User | Bendahara | Guru</a></li>
            <li class="active">Data User</li>
          </ol>
          <br>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a  href="?page=user&aksi=tambah_user" class="btn btn-success" style="margin-left: 10px"><i class="fa fa-plus"> &nbsp;Tambah Data</i></a></h3>
            </div>
             
     
            <p>
           
        </p>
            <div class="box-body">
          
              <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                  <th>No</th>
                  <th>NIP | NIS</th>
                  <th>Nama </th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Aksi</th>
                 
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $i=1;
                        foreach ($result as $show) {
                    ?>
                    <tr>
                  <td><?= $i;?></td>
                  <td><?php echo $show['nip'] ?></td>
                  <td><?php echo $show['nama_pegawai'] ?></td>
                  <td><?php echo $show['email_pegawai'] ?></td>
                  <td><?php echo $show['level_pegawai'] ?></td>

                   <td align="center">
                                        
                                        <a href="?page=user&aksi=ubah&id=<?= $show['id_pegawai']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> | 
                                        <a href="?page=user&aksi=proses&id=<?= $show['id_pegawai']; ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Ini?')"><i class="fa fa-times"></i></a>
                                    </td>
                    </tr>

                  <?php  $i++;} ?>
                </tfoot>
              </table>
                     <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

        
            