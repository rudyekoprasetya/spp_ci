<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-money"></i> <?php echo $judul; ?></h3>
</div>

<div class="panel-body">
  <div class="row">
	<div class="col-lg-12">

<?php foreach($siswa->result() as $row) {?>
		<center>
			<img src="<?= base_url().'/assets/uploads/foto_siswa/'.$row->foto ?>" class="img-rounded img-responsive" width="160px" height="180px">
		</center>
		<label>NIS</label>
		<input type="text" class="form-control" value="<?= $row->nis?>" readonly="readonly">
		<label>Nama Siswa</label>
		<input type="text" class="form-control" value="<?= $row->nama_lengkap?>" readonly="readonly">
		<label>Tempat lahir</label>
		<input type="text" class="form-control" value="<?= $row->tempat_lahir?>" readonly="readonly">
		<label>Tanggal Lahir</label>
		<input type="text" class="form-control" value="<?= $row->tgl_lahir?>" readonly="readonly">
		<label>Jenis Kelamin</label>
		<input type="text" class="form-control" value="<?= $row->jenis_kelamin?>" readonly="readonly">
		<label>alamat</label>
		<textarea class="form-control" readonly="readonly"><?= $row->nama_lengkap?></textarea>
		<label>Nama Ayah</label>
		<input type="text" class="form-control" value="<?= $row->nama_ayah?>" readonly="readonly">
		<label>Nama Ibu</label>
		<input type="text" class="form-control" value="<?= $row->nama_ibu?>" readonly="readonly">
		<label>No HP</label>
		<input type="text" class="form-control" value="<?= $row->hp?>" readonly="readonly">
		<label>Kelas Siswa</label>
		<input type="text" class="form-control" value="<?= $row->nama_kelas?>" readonly="readonly">
<?php }?>
	</div>
  </div>
</div>