<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-table"></i> <?php echo $judul; ?></h3>
</div>

<div class="panel-body">
  <div class="row">
  	<div class="col-lg-12">
  		<div class="jumbotron">
		  <h1>Selamat Datang !</h1>
		  <p>di Sistem Informasi Pembayaran SPP dengan Notifikasi SMS Berbasis Web SMK Taman Siswa Kota Kediri</p>
		</div>
  	</div>  	
  </div>

  <div class="row">
  	

  	<div class="col-lg-3">
  		<div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-users"></i> Siswa</h3>
		  </div>
		  <div class="panel-body">
		    <h2><?= $siswa; ?> Siswa</h2>
		  </div>
		</div>
  	</div>

  	<div class="col-lg-3">
  		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-home"></i> Kelas</h3>
		  </div>
		  <div class="panel-body">
		    <h2><?= $kelas; ?> Kelas</h2>
		  </div>
		</div>
  	</div>

  	<div class="col-lg-3">
  		<div class="panel panel-danger">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-user-md"></i> Pengguna</h3>
		  </div>
		  <div class="panel-body">
		    <h2><?= $user; ?> Orang</h2>
		  </div>
		</div>
  	</div>

  	<div class="col-lg-3">
  		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-envelope"></i> SMS Terkirim</h3>
		  </div>
		  <div class="panel-body">
		    <h2><?= $sentitems; ?> SMS</h2> 
		  </div>
		</div>
  	</div>

  </div>
</div>