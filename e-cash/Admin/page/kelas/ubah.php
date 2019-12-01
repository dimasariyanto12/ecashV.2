<!-- Day 7 -->

<?php

//Ambil Id
   $id1 =base64_decode($_GET['id']);
	$id2 =base64_decode($id1);
	$id3 =base64_decode($id2);
$result = $mysqli->getData("SELECT * FROM tbl_kelas, tbl_jurusan WHERE tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan AND tbl_kelas.id_kelas='$id3'");
//tampil
foreach ($result as $tampil):    
?>

<section class="content-header">
	<h1>
	 	<li class="fa fa-plus-square">Ubah Data Kelas</li><b>|</b>
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
			<form class="form-horizontal"  method="POST"  action="?page=kelas&aksi=proses" enctype="multipart/form-data">
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

						<input type="hidden" class="form-control" name="id_kelas" required="" value="<?= $en3; ?>" />
						
		
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Jurusan</label>
							<div class="col-md-6 col-xs-12"> 
								<select class="form-control select" name="id_jurusan" data-live-search="true">
									<?php
									$tampil_jurusan = $mysqli->getData("SELECT * FROM tbl_jurusan");

									foreach ($tampil_jurusan as $show) {
										?>
										<option value="<?= $show['id_jurusan']; ?>" 
											<?php if($tampil['id_jurusan']==$show['id_jurusan']) { echo "selected=''"; } ?>><?= $show['nama_jurusan']; ?></option>
											<?php
										}
										?>
									</select>    
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Tingkat</label>
								<div class="col-md-6 col-xs-12"> 
									<select class="form-control select" name="tingkat_kelas" >

										<?php
										if($tampil['tingkat_kelas']=='10') {
											echo '
											<option value="10" selected="">X</option>
											<option value="11">XI</option>
											<option value="12">XII</option>
											';
										}
										else if($tampil['tingkat_kelas']=='11') {
											echo '
											<option value="10">X</option>
											<option value="11" selected="">XI</option>
											<option value="12">XII</option>
											';
										}
										else {
											echo '
											<option value="10">X</option>
											<option value="11">XI</option>
											<option value="12" selected="">XII</option>
											';
										}
										?>
										
									</select>    
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Nama Kelas</label>
								<div class="col-md-6 col-xs-12"> 
									<input type="text" class="form-control" name="nama_kelas" placeholder="Masukan Nama Kelas" required="" value="<?= $tampil['nama_kelas']; ?>"/>    
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">Wali Kelas</label>
								<div class="col-md-6 col-xs-12"> 
									<select class="form-control select" name="id_user" data-live-search="true">
										<?php
										$tampil_user = $mysqli->getData("SELECT * FROM tbl_user WHERE level_user='Wali Kelas' ");

										foreach ($tampil_user as $show) {
											?>
											<option value="<?= $show['id_user']; ?>" 
												<?php if($tampil['id_user']==$show['id_user']) { echo "selected=''"; } ?>><?= $show['nama_user']; ?></option>
												<?php
											}
											?>
										</select>    
									</div>
								</div>
	
								<div class="panel-footer">
								 <a href="?page=kelas" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left"></i>Batal</a>
								 <button class="btn btn-primary pull" name="update"><i class="fa fa-save"></i>&nbsp;Ubah</button><br><br>
							 </div>
							 
						 </div>
					 </form>

				 </div>
			 </div>                    
			 
		 </div>
                                           
<?php
	 endforeach;
?>          


