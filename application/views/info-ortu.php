<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-info-circle"></i> <?php echo $judul; ?></h3>
</div>
<div class="panel-body">
  <div class="row">
  	<div class="jumbotron">
	    <?php if($this->session->flashdata('alert')){ ?>
	    	<h1><?= $this->session->flashdata('alert'); ?></h1>	    
	    <?php } ?>
	    	<center>
	    		<img src="<?= base_url().'/assets/img/contoh-ovo.png' ?>" class="img-responsive img-thumbnail" width="320px" height="320px">
	    		<h3><b>0857-3699-1133</b></h3>
	    	</center>
	    	<ul class="list-group">
			  <li class="list-group-item">NIS <?= $nis ?></li>
			  <li class="list-group-item">Nama <?= $nama ?></li>
			  <li class="list-group-item">Kelas <?= $kelas ?></li>
			  <li class="list-group-item">Total Bayar <b><?= $total; ?></b> </li>
			</ul>
	    	<p>Silahkan melakukan pembayaran melalui Akun OVO diatas. Jika sudah melakukan pembayaran silahkan konfirmasi ke <a href="https://wa.me/085736991133" class="btn btn-success"><i class="fa fa-user-md"></i> 0857-3699-1133</a> a/n Indah Sulihati</p>
	    	<p><a class="btn btn-primary btn-lg" href="<?= site_url('ortu/cara'); ?>" role="button"><i class="fa fa-info-circle"></i> Cara Pembayaran</a></p>
	  </div>
  </div>
</div>