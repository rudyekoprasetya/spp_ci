<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-table"></i> <?php echo $judul; ?></h3>
</div>

<div class="panel-body">
<!-- untuk form cari -->
  <div class="row">
	<div class="col-lg-5">
		<label>Kelas</label>
		<select name="kelas" id="kelas" class="form-control" onchange="ajax_siswa()">
			<option>Pilih Kelas</option>
<?php foreach ($kelas->result() as $row) { ?>
			<option value="<?= $row->kode_kelas; ?>"><?= $row->nama_kelas; ?></option>
	
<?php } ?>
		</select>
	</div>
	<div class="col-lg-5">
		<label>Siswa</label>
		<select name="nis" id="nis" class="form-control">
			<option>Pilih Kelas Dulu</option>
		</select>
	</div>
	<div class="col-lg-2">
		<label></label>
		<button type="button" class="btn btn-danger btn-lg btn-block" onclick="lihat_laporan()"><i class="fa fa-search"></i> Lihat</button>
	</div>
  </div>
<!-- untuk form cari -->
</div>

<!-- untuk tabel laporan -->
<div class="row">
  	<div class="col-lg-12">
  		<div class="table-responsive">
          <table class="table table-hover table-striped">
          	<thead>
          		<tr>
          			<th>NIS</th>
          			<th>Nama Siswa</th>
          			<th>Kelas</th>
          			<th>SPP</th>
          			<th>Bulan</th>
          			<th>Tanggal Bayar</th>	
          		</tr>
          	</thead>
          	<tbody id="tempat_data">
          		<tr>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          		</tr>
          	</tbody>
          </table>
        </div>
    </div>
    <div id="rekap">
	    </div>
	    <div class="col-lg-12">
	    	<button class="btn btn-success btn-lg">
	    		<i class="fa fa-print"></i> Cetak 
	    	</button>
	    </div>
    </div>
</div>
<!-- untuk tabel laporan -->

<script type="text/javascript">

	function ajax_siswa() {
		var kode_kelas=$('#kelas').val();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('laporan/ajax_siswa'); ?>",
			data: "kode_kelas="+kode_kelas,
			success: function(data) {
				console.log(data);
				$('#nis').html(data);
			}
		});
	}

	function lihat_laporan() {
		var nis=$('#nis').val();
		//ajax untuk tampil laporan
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("laporan/lap_spp"); ?>',
			data: 'nis='+nis,
			dataType: 'json',
			success: function(data) {
				console.log(data);

				//kosongkan tabel
				$('#tempat_data').hide();			
				$('#tempat_data').html('');

				//memasukan data ke tabel
				$.each(data, function(i,field){
					$('#tempat_data').
					append($('<tr>').
						append($('<td>').append(field.nis)).
						append($('<td>').append(field.nama_lengkap)).
						append($('<td>').append(field.nama_kelas)).
						append($('<td align="right">').append(field.spp)).
						append($('<td align="center">').append(field.bulan)).
						append($('<td>').append(field.waktu_bayar))
					);

				});		
				$('#tempat_data').show(1000);
			}
		});

	}
</script>