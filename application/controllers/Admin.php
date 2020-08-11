<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
	}

	public function _crud_output($output = null) {
		$this->template->display('utama.php',$output);
	}

	public function encrypt_password_callback($post_array, $primary_key = null) {
		  $post_array['password'] = md5($post_array['password']);
		  return $post_array;
	}


	public function siswa() {
		$crud = new grocery_CRUD();
		//pilih tabel
		$crud->set_table('tb_siswa');
		$crud->set_subject('Siswa');
		$crud->set_field_upload('foto','assets/uploads/foto_siswa/');
		//relasi
		$crud->set_relation('kode_kelas','tb_kelas','nama_kelas');
		//field yang harsu diisi
		$crud->required_fields('nis','nama_lengkap','hp','kode_kelas');		
		$crud->columns('nis','nama_lengkap','tempat_lahir','tgl_lahir','jenis_kelamin','hp','kode_kelas');
		$data['judul']='Manajemen Data Siswa';
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function kelas() {
		$crud = new grocery_CRUD();
		//pilih tabel
		$crud->set_table('tb_kelas');
		$crud->set_subject('Kelas');
		//field yang harsu diisi
		$crud->required_fields('kode_kelas','nama_kelas');
		$data['judul']='Manajemen Data Kelas';
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function user() {
		$crud=new grocery_CRUD();
		$crud->set_table('tb_user');
		$crud->set_subject('Pengguna');
		$crud->required_fields('username','password');
		//merubah input type password
		$crud->change_field_type('password', 'password');
		//enkripsi password
		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
  		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		$crud->columns('username');
		$data['judul']="Manajemen Pengguna";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function rekap() {
		$crud=new grocery_CRUD();
		$crud->set_table('tb_transaksi');
		$crud->set_subject('Transaksi');
		$crud->set_relation('nis','tb_siswa','nama_lengkap');
		//disable tombol
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$data['judul']="Rekapitulasi Pembayaran Siswa";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function transaksi() {
		$crud=new grocery_CRUD();
		$crud->set_table('tb_transaksi');
		$crud->where('status_bayar =', 'belum');
		$crud->set_subject('Kelola Transaksi');
		$crud->set_relation('nis','tb_siswa','nama_lengkap');
		$crud->columns('nis','spp','bulan','ket','status_bayar','waktu_bayar');
		$crud->display_as('nis','Nama Siswa');
		$crud->display_as('status_bayar','Konfirmasi Bayar');
		//disable tombol
		$crud->unset_add();
		$crud->unset_delete();
		$data['judul']="Pembayaran Online";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function inbox() {
		$crud=new grocery_CRUD();
		$crud->set_table('inbox');
		$crud->set_subject('Inbox SMS');
		$crud->columns('ID','ReceivingDateTime','SenderNumber','TextDecoded');
		$crud->display_as('ID','No');
		$crud->display_as('ReceivingDateTime','Waktu Diterima');
		$crud->display_as('SenderNumber','Pengirim');
		$crud->display_as('TextDecoded','Isi Pesan');
		//disable tombol
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();		
		$data['judul']="Data Inbox SMS";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function sentitems() {
		$crud=new grocery_CRUD();
		$crud->set_table('sentitems');
		$crud->set_subject('SMS Terkirim');
		$crud->columns('ID','SendingDateTime','DestinationNumber','TextDecoded');
		$crud->display_as('ID','No');
		$crud->display_as('SendingDateTime','Waktu Dikirm');
		$crud->display_as('DestinationNumber','Penerima');
		$crud->display_as('TextDecoded','Isi Pesan');
		//disable tombol
		$crud->unset_add();
		$crud->unset_edit();	
		$data['judul']="Data SMS Terkirim";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function outbox() {
		$crud=new grocery_CRUD();
		$crud->set_table('outbox');
		$crud->set_subject('Kirim SMS');
		$crud->fields('DestinationNumber','TextDecoded');
		$crud->columns('ID','DestinationNumber','SendingDateTime','TextDecoded');
		$crud->display_as('ID','No');
		$crud->display_as('DestinationNumber','No Tujuan');
		$crud->display_as('TextDecoded','Isi Pesan');
		$crud->display_as('SendingDateTime','Waktu Kirim');
		//disable tombol
		$crud->unset_edit();	
		$data['judul']="Data Outbox";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function ortu() {
		$crud = new grocery_CRUD();
		//pilih tabel
		$crud->set_table('tb_ortu');
		$crud->set_subject('Orang Tua');
		//relasi
		$crud->set_relation('nis','tb_siswa','nama_lengkap');
		$crud->set_relation('id_user','tb_user','username');
		//field yang harsu diisi
		$crud->required_fields('id_user','nis','nama');
		$crud->display_as('nis','Nama Siswa');	
		$crud->display_as('id_user','Username');	
		$data['judul']='Manajemen Akun Orang Tua';
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

}