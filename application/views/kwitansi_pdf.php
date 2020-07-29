<?php
 $time=strtotime($waktu_bayar);
 $tgl_bayar=date("d-m-Y",$time);
?>

<hr>
<table border="0" align="center">
<tr>
	<td rowspan="2"><img src="<?= base_url().'/assets/img/logo.png' ?>" width="50px" height="50px" ></td>
	<td align="center"><h3>SMK TAMAN SISWA KEDIRI</h3></td>
</tr>
<tr>
	<td align="center"><b>Jl. Pemuda No 123 Dandangan Kota Kediri</b></td>
</tr>
</table>

<hr>

<table border="0" align="center">
	<tr>
		<td><b>No Kwintansi</b></td>
		<td style="width: 150px;" align="right"><?= $id_transaksi; ?></td>
		<td><b>Tanggal</b></td>
		<td style="width: 150px;" align="right"><?= $tgl_bayar; ?></td>
	</tr>
	<tr>
		<td><b>Nama Siswa</b></td>
		<td align="right"><?= $nama; ?></td>
		<td><b>Kelas/Jurusan</b></td>
		<td align="right"><?= $kelas; ?></td>
	</tr>
</table>
<hr>
<table border="0" align="center">
	<tr>
		<td>SPP Bulan ke-<?= $bulan; ?></td>
		<td style="width: 85px;"></td>
		<td align="right" style="width: 180px;"> <b><?= number_format($spp); ?></b></td>
	</tr>
	<tr>
		<td>Kesiswaan</td>
		<td></td>
		<td align="right"> <b><?= number_format($kesiswaan); ?></b></td>
	</tr>
	<tr>
		<td>Daftar Ulang</td>
		<td></td>
		<td align="right"> <b><?= number_format($daftar_ulang); ?></b></td>
	</tr>
	<tr>
		<td>PSG</td>
		<td></td>
		<td align="right"> <b><?= number_format($psg); ?></b></td>
	</tr>
	<tr>
		<td>UTS/UAS</td>
		<td></td>
		<td align="right"> <b><?= number_format($uts_uas); ?></b></td>
	</tr>	
	<tr>
		<td>UNAS/UKK</td>
		<td></td>
		<td align="right"> <b><?= number_format($unas); ?></b></td>
	</tr>	
	<tr>
		<td>Lainnya</td>
		<td></td>
		<td align="right"> <b><?= number_format($lain_lain); ?></b></td>
	</tr>
	<tr>
		<td colspan="2">Total</td>
		<td align="right"> <b><?= number_format($total); ?></b></td>
	</tr>
	<tr>
		<td colspan="2">Bayar</td>
		<td align="right"> <b><?= number_format($bayar); ?></b></td>
	</tr>
	<tr>
		<td colspan="2">Kembali</td>
		<td align="right"> <b><?= number_format($kembali); ?></b></td>
	</tr>
</table>
<hr>
<table align="center">
	<tr>
		<td><b>Catatan : </b></td>
		<td><p><i><?= $ket; ?></i></p></td>
	</tr>
</table>
<hr>