 

<?php
 $idkelas = @$_SESSION['idkelas'];
?>
 <section class="content-header">
			<h1><i class="fa fa-dashboard"></i>
				Dashboard |
				<small>SMKN 1 BANGSRI</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</section>







	 <!-- Main content -->
		<section class="content">

			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							 <?php
																		$siswa = $mysqli->getData("SELECT count(*) as total FROM tbl_transaksi ");
																		foreach ($siswa as $p) {
																			 
																			
																		}
																?>
							<h3><?= $p['total']; ?></h3>


							<p>Transaksi Masuk</p>
						</div>
						<div class="icon">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<a href="?page=masuk" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
			 
				 <div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							 <?php
																		$siswa = $mysqli->getData("SELECT count(*) as total FROM kas ");
																		foreach ($siswa as $p) {
																			 
																			
																		}
																?>
							<h3><?= $p['total']; ?></h3>
							<p>Transaksi Keluar</p>
						</div>
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<a href="?page=keluar" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>

				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							 <?php
																		$siswa = $mysqli->getData("SELECT count(*) as total FROM tbl_siswa ");
																		foreach ($siswa as $p) {
																			 
																			
																		}
																?>
							<h3><?= $p['total']; ?></h3>
							<p>Daftar Siswa</p>
						</div>
						<div class="icon">
							<i class="fa fa-users"></i>
						</div>
						<a href="?page=siswa" class="small-box-footer">
							More info <i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					
					<div class="small-box bg-green">
						<div class="inner">
						 <?php
						 $siswa = $mysqli->getData("SELECT count(*) as total FROM tbl_user ");
						 foreach ($siswa as $p) {
							 
							
						 }
						 ?>
						 <h3><?= $p['total']; ?></h3>

						 <p>Daftar User</p>
					 </div>
					 <div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a href="?page=users" class="small-box-footer">
						More info <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="box box-success collapsed-box">
					<div class="box-header with-border">
						<h3 class="box-title">Riwayat Pembayaran</h3>
						<br>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
							</button>
						</div>

						<div class="box-body">
						 <?php

						 $riwayat = $mysqli->getData("SELECT * FROM tbl_transaksi t , tbl_siswa s WHERE t.id_siswa = s.id_siswa AND t.id_kelas=$idkelas  ORDER BY t.id_transaksi DESC limit 5");
						/* var_dump($idkelas);

						 echo "SELECT * FROM tbl_transaksi t , tbl_siswa s,  WHERE t.id_siswa = s.id_siswa AND t.id_kelas=$idkelas  ORDER BY t.id_transaksi DESC limit 5";*/
						 foreach ($riwayat as $show) {

							?>   
							<a class="list-group-item">
								
								<span class="contacts-title"><?= substr($show['nama_siswa'] ,0, 30)?></span>
								<p> Telah Membayar KAS senilai <?= $mysqli->format_rupiah($show['nominal_transaksi']); ?></p>                               
							</a>
							<?php
						}
						?>
					</div>



				 
											
					</section>
			 