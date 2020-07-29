<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
		// load model
		$this->load->model('Model_ci');
	}

	public function spp() {
		$data['judul']="Laporan Pembayaran SPP";
		$data['kelas']=$this->Model_ci->get_all('tb_kelas');
		$this->template->display('lap_spp',$data);
	}

	public function lain() {
		$data['judul']="Laporan Pembayaran Lainnya";
		$data['kelas']=$this->Model_ci->get_all('tb_kelas');
		$this->template->display('lap_lain',$data);
	}

	public function lap_spp() {
		$nis=$this->input->post('nis',true);
		$thn=date("Y");
		$hasil=$this->Model_ci->lap_spp($nis,$thn);
		echo json_encode($hasil->result());
	}

	public function lap_lain() {
		$nis=$this->input->post('nis',true);
		$thn=date("Y");
		$hasil=$this->Model_ci->lap_lain($nis,$thn);
		echo json_encode($hasil->result());
	}

	public function ajax_siswa() {
		$kode_kelas=$this->input->post('kode_kelas',true);
		$data=$this->Model_ci->get_where('tb_siswa',array('kode_kelas'=>$kode_kelas));
		foreach ($data->result() as $row) {
			echo "
			<option value='".$row->nis."'>".$row->nama_lengkap."</option>
			";
		}
	}

}