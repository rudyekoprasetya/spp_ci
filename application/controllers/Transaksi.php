<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
		// load model
		$this->load->model('Model_ci');
	}

	public function index() {
		$data['judul']="Pembayaran SPP";
		$this->template->display('view-transaksi',$data);
	}


	public function cari_siswa() {
		$data['judul']="Pembayaran SPP";
		$key=$this->input->post('key',true);
		$hasil=$this->Model_ci->view_siswa()->row();
		if(!empty($hasil)) {
		//ambil data 
			$data['nis']=$hasil->nis;
			$data['nama']=$hasil->nama_lengkap;
			$data['kelas']=$hasil->nama_kelas;
		}

		$this->template->display('view-transaksi',$data);

	}

	public function cetak() {
		//generate ID Transaksi
		$id_transaksi="SPP-".date("Ymdhis");
		$data=array(
			'id_transaksi' => $id_transaksi,
			'nis' => $this->input->post('nis',true),
			'bulan' => $this->input->post('bulan',true),
			'spp' => $this->input->post('spp',true),
			'kesiswaan' => $this->input->post('kesiswaan',true),
			'daftar_ulang' => $this->input->post('daftar_ulang',true),
			'lain_lain' => $this->input->post('lain_lain',true),
			'psg' => $this->input->post('psg',true),
			'uts_uas' => $this->input->post('uts_uas',true),
			'unas' => $this->input->post('unas',true),
			'ket' => $this->input->post('ket',true),
			'waktu_bayar' => date("Y-m-d h:i:s")
		);

		$save=$this->Model_ci->insert('tb_transaksi',$data);

		if($save) {

			$nama = $this->input->post('nama',true);
			$kelas = $this->input->post('kelas',true);
			$total_bayar = $this->input->post('total_bayar',true);
			$bayar = $this->input->post('bayar',true);
			$kembali = $this->input->post('kembali',true);	

			//ambil data no hp ortu
			$ortu=$this->Model_ci->get_where('tb_siswa',array('nis',$this->input->post('nis',true)))->row();
			$hp=$ortu->hp;

			//kirim SMS Notifikasi ke Orang tua
			$pesan="Diterima Pembayaran SPP dan lainnya Dari ".$nama." Kelas ".$kelas." Sebesar Rp. ".number_format($total_bayar)." Terima Kasih  ~SMK Taman Siswa Kediri~ ";

			$datasms=array(
				'DestinationNumber' => $hp,
				'TextDecoded' => $pesan
			);

			$kirimsms=$this->Model_ci->insert('outbox',$datasms);

	    	echo "<embed src='".site_url('transaksi/kwitansi/'.$id_transaksi.'/'.$nama.'/'.$kelas.'/'.$total_bayar.'/'.$bayar.'/'.$kembali)."' width='100%' style='height: 500px;' type='application/pdf'>
					";

		}

	}

	public function kwitansi() {
		// $this->load->view('kwitansi_pdf');
		$id_transaksi=$this->uri->segment(3);
		$data['nama']=$this->uri->segment(4);
		$data['kelas']=$this->uri->segment(5);
		$data['total']=$this->uri->segment(6);
		$data['bayar']=$this->uri->segment(7);
		$data['kembali']=$this->uri->segment(8);
		$hasil=$this->Model_ci->get_where('tb_transaksi',array('id_transaksi'=>$id_transaksi))->row();
		$data['id_transaksi']=$hasil->id_transaksi;
		$data['nis']=$hasil->nis;
		$data['spp']=$hasil->spp;
		$data['bulan']=$hasil->bulan;
		$data['kesiswaan']=$hasil->kesiswaan;
		$data['daftar_ulang']=$hasil->daftar_ulang;
		$data['lain_lain']=$hasil->lain_lain;
		$data['psg']=$hasil->psg;
		$data['uts_uas']=$hasil->uts_uas;
		$data['unas']=$hasil->unas;
		$data['ket']=$hasil->ket;
		$data['waktu_bayar']=$hasil->waktu_bayar;


		// var_dump($data);

		$this->pdf->setPaper('A4', 'potrait');
    	$this->pdf->filename = "kwitansi.pdf";
    	$this->pdf->load_view('kwitansi_pdf', $data);

	}

}