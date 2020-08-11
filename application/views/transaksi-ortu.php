<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-table"></i> <?php echo $judul; ?></h3>
</div>
<?php if($this->session->flashdata('alert')){ ?>
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?= $this->session->flashdata('alert'); ?>
	</div>
<?php } ?>
<div class="panel-body">
<form method="POST" action="<?= site_url('ortu/bayar'); ?>">
  <div class="row">
  	<div class="col-lg-6">  	
	 <label>Nama Siswa</label>
	 <!-- menampilkan nis -->
	 <input type="hidden" id="nis" name="nis" value="<?php if(isset($nis)){echo $nis;} ?>">

	 <!-- menampilkan nama  -->
	 <input type="text" class="form-control" id="nama" name="nama" value="<?php if(isset($nama)){echo $nama;} ?>" readonly="readonly">

	 <label>Kelas</label>

	 <!-- menampilkan kelas -->
	 <input type="text" class="form-control" id="kelas" name="kelas" value="<?php if(isset($kelas)){echo $kelas;} ?>" readonly="readonly">
	 <label>Bulan</label>
	 <select class="form-control" id="bulan" name="bulan" onchange="getSPP()">
	 	<option>--Pilih Bulan--</option>
	 	<option value="01">Januari</option>
	 	<option value="02">Februari</option>
	 	<option value="03">Maret</option>
	 	<option value="04">April</option>
	 	<option value="05">Mei</option>
	 	<option value="06">Juni</option>
	 	<option value="07">Juli</option>
	 	<option value="08">Agustus</option>
	 	<option value="09">September</option>
	 	<option value="10">Oktober</option>
	 	<option value="11">November</option>
	 	<option value="12">Desember</option>
	 </select> 
	 <label>SPP</label>
	 <input type="number" class="form-control"  id="spp" name="spp" value="0">
	 <label>Lain-lain</label>
	 <input type="number" class="form-control" name="lain_lain"  id="lain_lain" value="0" onkeyup="getTotal()">		 
  	</div>
  	<div class="col-lg-6">
		<label>Kesiswaan</label>
		 <input type="number" class="form-control" name="kesiswaan" id="kesiswaan" value="0" onkeyup="getTotal()">
		 <label>Daftar Ulang</label>
		 <input type="number" class="form-control" name="daftar_ulang" id="daftar_ulang" value="0" onkeyup="getTotal()">
		 <label>PSG</label>
		 <input type="number" class="form-control" name="psg" id="psg" value="0" onkeyup="getTotal()">
		 <label>UTS/UAS</label>
		 <input type="number" class="form-control" name="uts_uas" id="uts_uas" value="0" onkeyup="getTotal()">
		 <label>UNAS/UKK</label>
		 <input type="number" class="form-control" name="unas" id="unas" value="0" onkeyup="getTotal()">
  	</div>  
  </div>
	<div class="row">
		<hr>
	</div>
	<div class="row" >
	  	<!--  -->
	  	<div class="col-lg-6">
	  		<label>Total</label>
			<input type="text" class="form-control input-lg" name="total_bayar" name="total_bayar" id="total_bayar" value="" readonly="readonly" style="text-align:right;">
	  	</div>
	  	<div class="col-lg-6">
			<label></label>
	  		<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-money"></i> Bayar</button>
	  	</div>
	</div>

</form>
</div>


<!-- Modal Edit data -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="tutup()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cetak Kwitansi</h4>
      </div>
      <div class="modal-body" id="modal_cetak">
        
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal' onclick="tutup()">Tutup</button>
		</div>
    </div>
  </div>
</div> -->
<!--END Modal Edit data -->

<script type="text/javascript">

	function convertToRupiah(angka) {
	  var rupiah = '';    
	  var angkarev = angka.toString().split('').reverse().join('');
	  for(var i = 0; i < angkarev.length; i++) 
	      if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	      return rupiah.split('',rupiah.length-1).reverse().join('');  
	}

	function getTotal() {
		var spp=parseInt($('#spp').val());
		var lain_lain=parseInt($('#lain_lain').val());
		var kesiswaan=parseInt($('#kesiswaan').val());
		var daftar_ulang=parseInt($('#daftar_ulang').val());
		var psg=parseInt($('#psg').val());
		var uts_uas=parseInt($('#uts_uas').val());
		var unas=parseInt($('#unas').val());

		var total_bayar=spp+lain_lain+kesiswaan+daftar_ulang+psg+uts_uas+unas;
		$('#total_bayar').val(convertToRupiah(total_bayar));
	}

	function getSPP() {
		$('#spp').val('110000');
		getTotal();
	}

	// function kembali() {
	// 	var total_bayar=$('#total_bayar').val().replace(".", "").replace(".", "");
	// 	var bayar=$('#bayar').val();

	// 	var kembalian=parseInt(bayar)-parseInt(total_bayar);

	// 	$('#kembali').val(convertToRupiah(kembalian));
	// }

	// function cetak() {
	// 	var nama=$('#nama').val();
	// 	var nis=$('#nis').val();
	// 	var kelas=$('#kelas').val();
	// 	var bulan=$('#bulan').val();
	// 	var spp=$('#spp').val();
	// 	var lain_lain=$('#lain_lain').val();
	// 	var kesiswaan=$('#kesiswaan').val();
	// 	var daftar_ulang=$('#daftar_ulang').val();
	// 	var psg=$('#psg').val();
	// 	var uts_uas=$('#uts_uas').val();
	// 	var unas=$('#unas').val();
	// 	var ket=$('#ket').val();
	// 	var total_bayar=$('#total_bayar').val().replace(".", "").replace(".", "");
	// 	var bayar=$('#bayar').val();
	// 	var kembali=$('#kembali').val().replace(".", "").replace(".", "");

	// 	$.ajax({
	// 		type: "POST",
	// 		url: "<?php echo site_url('transaksi/cetak'); ?>",
	// 		data: "nama="+nama+"&nis="+nis+"&kelas="+kelas+"&bulan="+bulan+"&spp="+spp+"&lain_lain="+lain_lain+"&kesiswaan="+kesiswaan+"&daftar_ulang="+daftar_ulang+"&psg="+psg+"&uts_uas="+uts_uas+"&unas="+unas+"&ket="+ket+"&total_bayar="+total_bayar+"&bayar="+bayar+"&kembali="+kembali,
	// 		success: function(data) {
	// 			console.log(data);
	// 			$('#modal_cetak').html(data);
	// 		}
	// 	});
	// }

	// function tutup() {
	// 	alert('SMS Notifikasi Terkirim');
	// 	document.location.href='<?= site_url('transaksi'); ?>'
	// }
</script>