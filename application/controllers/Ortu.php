<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ortu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
		// load model
		$this->load->model('Model_ci');
	}

	public function index() {
		$data['judul']="Biodata Siswa";
		$data['siswa']=$this->Model_ci->view_ortu($this->session->userdata('username'));
		$this->template->display('view-ortu',$data);
	}

	public function transaksi() {
		$data['judul']="Pembayaran";
		$dataSiswa=$this->Model_ci->view_ortu($this->session->userdata('username'))->row();
		$nis=$dataSiswa->nis;
		$hasil=$this->Model_ci->view_siswa($nis)->row();
		if(!empty($hasil)) {
		//ambil data 
			$data['nis']=$hasil->nis;
			$data['nama']=$hasil->nama_lengkap;
			$data['kelas']=$hasil->nama_kelas;
		}

		$this->template->display('transaksi-ortu',$data);
	}

	public function bayar() {
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
			'ket' => "ovo",
			'waktu_bayar' => date("Y-m-d h:i:s")
		);
		$totalBayar=$this->input->post('total_bayar');

		$save=$this->Model_ci->insert('tb_transaksi',$data);

		if($save) {
			$this->session->set_flashdata('alert','Pembayaran Berhasil Disimpan!');
			redirect('ortu/info/'.$totalBayar);
		} else {
			$this->session->set_flashdata('alert','Pembayaran Gagal Disimpan!');
			redirect('ortu/transaksi');
		}
	}

	public function info() {
		$data['judul']="Info Pembayaran";
		$data['total']=$this->uri->segment(3);
		$hasil=$this->Model_ci->view_ortu($this->session->userdata('username'))->row();
		$data['nis']=$hasil->nis;
		$data['nama']=$hasil->nama_lengkap;
		$data['kelas']=$hasil->nama_kelas;
		$this->template->display('info-ortu',$data);
	}

	public function cara() {
		$data['judul']="Cara Pembayaran";
		$this->template->display('cara-bayar',$data);
	}

}