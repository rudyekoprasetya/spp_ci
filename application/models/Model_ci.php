<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_ci extends CI_Model {

	public function __construct() {
			 parent:: __construct();
		}		

	//fungsi Cek user apakah ada dalam tabel admin
	public function cek($user,$pass) { 
		 $this->db->where('username',$user);
		 $this->db->where('password',$pass);
		 $data=$this->db->get('tb_user');
		 if ($data->num_rows() > 0) {
		 	return TRUE;		
		 	}
		 else {
			return FALSE;	 	
		 	}
	}

	//join data ortu
	public function view_ortu($username) {
		$query="SELECT c.id_ortu, a.nis, a.nama_lengkap, a.tempat_lahir, a.tgl_lahir, a.jenis_kelamin, a.foto, a.alamat,  a.nama_ayah, a.nama_ibu, a.hp, b.nama_kelas, d.username FROM tb_kelas b JOIN tb_siswa a ON a.kode_kelas=b.kode_kelas JOIN tb_ortu c ON c.nis=a.nis JOIN tb_user d ON d.id_user=c.id_user WHERE d.username='$username'";
		return $this->db->query($query);
	}

	//fungsi join kelas
	public function view_siswa($key) {
		$query="SELECT a.nis, a.nama_lengkap, b.nama_kelas FROM tb_siswa a JOIN tb_kelas b ON a.kode_kelas=b.kode_kelas WHERE a.nis='$key'";
		return $this->db->query($query);
	}

	public function lap_spp($nis,$thn) {
		$query="SELECT b.nis, b.nama_lengkap, a.nama_kelas, c.spp, c.bulan, DATE_FORMAT(c.waktu_bayar , '%d-%m-%Y') AS waktu_bayar FROM tb_kelas a JOIN tb_siswa b ON a.kode_kelas=b.kode_kelas LEFT JOIN tb_transaksi c ON c.nis=b.nis WHERE c.nis='$nis' AND YEAR(c.waktu_bayar)='$thn' ORDER BY c.bulan ASC ";
		return $this->db->query($query);
	}

	public function lap_lain($nis,$thn) {
		$query="SELECT b.nis, b.nama_lengkap, a.nama_kelas, c.kesiswaan, c.daftar_ulang, c.psg, c.uts_uas, c.unas, c.lain_lain, DATE_FORMAT(c.waktu_bayar , '%d-%m-%Y') AS waktu_bayar FROM tb_kelas a JOIN tb_siswa b ON a.kode_kelas=b.kode_kelas LEFT JOIN tb_transaksi c ON c.nis=b.nis WHERE c.nis='$nis' AND YEAR(c.waktu_bayar)='$thn' ORDER BY c.bulan ASC  ";
		return $this->db->query($query);
	}

	public function insert($table, $data) {
      return $this->db->insert($table, $data);
	}

	public function get_all($table) {
		return $this->db->get($table);
	}

	public function get_where($table, $where) {
		return $this->db->get_where($table,$where);
	}

	public function get_filter($table, $where, $order_by=null,$select='*') {
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order_by);		

		return $this->db->get();
	}

	public function update($table, $data, $where) {
		$this->db->set($data, null);
		$this->db->where($where);
		$this->db->update($table);
		return $this->db->affected_rows();
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	public function total_rows($table) {
		return $this->db->count_all_results($table);
	}

	public function maxdata($id, $table) {
		$data = $this->db->select_max($id, 'lastid');
		$data = $this->db->get($table);
		return $data;
	}



}