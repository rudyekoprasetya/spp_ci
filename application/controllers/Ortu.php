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

	}

	public function pembayaran() {

	}

}