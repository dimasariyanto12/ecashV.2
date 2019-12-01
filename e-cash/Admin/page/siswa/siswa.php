<?php 

include "hak_akses.php";
$query = "SELECT * FROM tbl_siswa, tbl_kelas WHERE tbl_siswa.id_kelas = tbl_kelas.id_kelas  ORDER BY tbl_siswa.nis ";
$result = $mysqli->getData($query);

?>





<section class="content-header">
  <h1><i class="fa fa-user"></i>&nbsp;
	Data Siswa|
	<small>SMKN 1 BANGSRI</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
	
	<li class="active">Data Siswa</li>
</ol>
<br>
<div class="page-content-wrap">                

	     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               
              <h3 class="box-title"> <a  href="?page=siswa&aksi=tambah_siswa" class="btn btn-primary" style="margin-left: 10px"><i class="fa fa-plus"> &nbsp;Tambah Data</i></a></h3>
            </div>
             
     
            <p>
           
        </p>
         <div class = "table-responsive">
            <div class="box-body">
          
              <table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th><center>No</center></th>
							<th><center>NIS</center></th>
							<th><center>Nama</center></th>
							<th><center>Jenis Kelamin</center></th>
							<th><center>Kelas</center></th>
							<th><center>Opsi</center></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach ($result as $r) {
							?>

							<tr>
								<td><?= $i; ?></td>
								<td><?= ucfirst($r['nis']); ?></td>
								<td><?= ucfirst($r['nama_siswa']); ?></td>
								<td><?= ucfirst($r['jekel_siswa']); ?></td>
								<td><?= $mysqli->format_romawi(ucfirst($r['tingkat_kelas'])); ?> <?= ucfirst($r['nama_kelas']); ?></td>
								
								
								<td align="center">
									
									<?php 
									$id1 =base64_encode($r['id_siswa']);
									$id2 =base64_encode($id1);
									$id3 =base64_encode($id2);
									?>
									<a href="?page=siswa&aksi=ubah&id=<?= $id3; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
									<a href="?page=siswa&aksi=proses&id=<?= $id3; ?>" class="btn btn-danger" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Ini?')"><i class="fa fa-times"></i></a>
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