<?php
class Login extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("Model_ci"); 
		}
	
	public function index() {
		$data['judul']="Sistem Informasi Pembayaran SPP";
		$this->load->view('view-login',$data);
		}
		
	public function cek() { 
		$username=$this->input->post('username',TRUE);
		$password=$this->input->post('password',TRUE);
		
		$cek=$this->Model_ci->cek($username,md5($password));
			if($cek==TRUE) {
			$data_admin=$this->Model_ci->get_where('tb_user',array('username'=>$username))->row();
			$akses=$data_admin->akses;
			// var_dump($akses);
			$data=array('username'=>$username,'akses'=>$akses,'logged_in'=>TRUE );
			$this->session->set_userdata($data);
			redirect('dashboard');
			} else {			
			$this->session->set_flashdata('alert','User dan Password tidak sesuai!');
			redirect('login','refresh');	
			}	
		
	}
		
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('akses');
		$this->session->set_flashdata('alert','Berhasil Logout!');
		redirect('login','refresh');
	}

	public function profil() {
		$data['judul']="Ubah Profil";
		$username=$this->session->userdata('username');
		$data['user']=$this->Model_ci->get_where('tb_user',array('username'=>$username));
		$this->template->display('profil',$data);
	}

	public function ubah_profil() {
		$data=array(
			'username'=>$this->input->post('username',true),
			'password'=>md5($this->input->post('password',true)),
			'akses'=>$this->input->post('akses',true),
			'is_aktif'=>"yes"
		);
		$where=array('id_user'=>$this->input->post('id_user',true));
		$this->Model_ci->update('tb_user', $data, $where);
		$this->session->set_flashdata('alert','Profile Berhasil Diubah!');
		redirect('login/profil');
	}
}
?>