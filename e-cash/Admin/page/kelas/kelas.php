<!-- Day 6 -->

<?php  
	    include 'hak_akses.php';
$query = "SELECT * FROM tbl_kelas LEFT JOIN tbl_jurusan ON tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan INNER JOIN         tbl_user ON tbl_kelas.id_user = tbl_user.id_user ORDER BY tbl_kelas.id_kelas DESC";
$result = $mysqli->getData($query);
?>


<section class="content-header">
  <h1>
	 <li class="fa fa-building-o"></li>&nbsp;Data Kelas <b>|</b>
	 <small>SMKN 1 BANGSRI</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
  	<li class="active">Kelas</li>
  </ol>
</section>
<br>

<div class="page-content-wrap">                
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<a href="?page=kelas&aksi=tambah" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Data</a>		
				</div>
				<div class="panel-body table-responsive">
					<table class="table datatable">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Kelas</center></th>
								<th><center>Jurusan</center></th>
								<th><center>Wali Kelas</center></th>
								<th><center>Aksi</center></th>
							</tr>
						</thead>
						<tbody>
						 <?php 
						 $i=1;
						 foreach ($result as $show) {
							?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $mysqli->format_romawi($show['tingkat_kelas']); ?> <?=($show['nama_kelas']); ?></td>
								<td><?= $show['nama_jurusan']; ?></td>
								<td><?= $show['nama_user']; ?></td>
								<?php 
										$id1 =base64_encode($show['id_kelas']);
										$id2 =base64_encode($id1);
										$id3 =base64_encode($id2);

								?>
								<td align="center">
									<a href="?page=kelas&aksi=ubah&id=<?= $id3; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> |
									<a  href="?page=kelas&aksi=proses&id=<?= $id3; ?>" class="btn btn-danger" onClick="return confirm('Data siswa yang ada dikelas ini akan terhapus juga, Apakah Anda Yakin ingin menghapusnya ?')"><i class="fa fa-times"></i></a>
								</td>
							</tr>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data Kelas <?= $mysqli->format_romawi($show['tingkat_kelas']); ?> <?=($show['nama_kelas']); ?> ini</p>
                    <p><strong>Peringatan</strong> Data siswa yang ada dikelas ini akan terhapus juga,Setelah data dihapus, data tidak dapat dikembalikan!, Apakah Anda Yakin ingin menghapusnya ?</p>
                    <br />
                    <p>Ingin melanjutkan menghapus?</p>
                    <p class="debug-url"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="?page=kelas&aksi=proses&id=<?= $id3; ?>" class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>



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

