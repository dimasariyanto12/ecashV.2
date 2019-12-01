<!-- Day 5 -->

<?php 
	//Ambil Data dari tbl_jurusan;
$query = "SELECT * FROM tbl_jurusan ORDER BY id_jurusan DESC";
$result = $mysqli->getData($query);
include "hak_akses.php";
?>

<section class="content-header">
  <h1>
	 <li class="fa fa-star "> </li>&nbsp;Kompetensi Keahlian
	 	|
	 <small>SMKN 1 BANGSRI</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-users"></i> Data Master</a></li>
  <li class="active">Kompetensi Keahlian</li>
</ol>
</section>

<br>

<div class="page-content-wrap">                
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">                                 
					<a href="?page=jurusan&aksi=tambah" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Data</a>		
				</div>
				<div class="panel-body table-responsive">
					<table class="table datatable">
						<thead>

							<tr>
								<th><center>No</center></th>
								<th><center>Nama</center></th>
								<th><center>Diskripsi</center></th>
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
									<td><?php echo $show['nama_jurusan']; ?></td>
									<td><?php echo $show['diskripsi_jurusan']; ?></td>
									<td align="center">
										<?php 
											$id1 =base64_encode($show['id_jurusan']);
											$id2 =base64_encode($id1);
											$id3 =base64_encode($id2);
										?>
										
										<a href="?page=jurusan&aksi=ubah&id=<?php echo $id3;?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>  |
										<a  href="?page=jurusan&aksi=proses&id=<?php echo $id3;?>" class="btn btn-danger " onClick="return confirm('Data Kompetensi Keahlian <?php echo $show['nama_jurusan']; ?> akan terhapus?')"   ><i class="fa fa-times"></i></a>
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
		</div>
	</div>                                
</div>










<?php $id1 =base64_decode($_GET['id']);
	$id2 =base64_decode($id1);
	$id3 =base64_decode($id2); ?>



<script>

        jQuery(document).ready(function($id3){
            $('.alert_notif').on('click',function(){
                var getLink  = $(this).attr('href');
                swal({

                title: "Apa Anda yakin?",
				text: "Data Kompetensi Keahlian  <?php echo $show['nama_jurusan']; ?> Akan dihapus",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Hapus!",
				closeOnConfirm: false
                        },function(){
                        window.location.href = '?page=jurusan&aksi=proses&id=<?php echo $id3;?>'
                    });
                return false;
            });
        });
	 
    </script>
