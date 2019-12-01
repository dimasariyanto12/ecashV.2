<!-- Day 5 -->





	<section class="content-header">
			<h1>
				 <li class="fa fa-star"> Kompetensi Keahlian</li>
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
			
			<form class="form-horizontal"   method="POST" action="?page=jurusan&aksi=proses" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"></h3>
						<br>
					</div>
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Nama Jurusan</label>
							<div class="col-md-6 col-xs-12"> 
								<input type="text" class="form-control" name="nama_jurusan" placeholder="Masukan Nama Jurusan" required=""/>    
							</div>
						</div>

						 <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Diskripsi</label>
                <div class="col-md-6 col-xs-12">   
                    <textarea class="form-control" rows="5" name="diskripsi_jurusan" placeholder="Masukan Diskripsi" required=""></textarea>
			                </div>
			            </div>
			      
									
						<div class="panel-footer">
						 <a href="?page=jurusan" button class="btn btn-danger pull"><i class="fa fa-arrow-circle-left">Batal</i></a>
						 <button class="btn btn-primary pull" name="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button><br><br>
					 </div>
				 </div>
			 </form>

		 </div>
	 </div>                    
	 
 </div>




