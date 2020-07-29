<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
		// load model
		$this->load->model('Model_ci');
	}

	public function index() {
		$data['judul']="Dashboard SPP";
		$data['siswa']=$this->Model_ci->total_rows('tb_siswa');
		$data['kelas']=$this->Model_ci->total_rows('tb_kelas');
		$data['user']=$this->Model_ci->total_rows('tb_user');
		$data['sentitems']=$this->Model_ci->total_rows('sentitems');
		$this->template->display('view-dashboard',$data);
	}

}