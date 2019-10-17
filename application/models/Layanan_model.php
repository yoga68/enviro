<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
	//load db

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing layanan
	public function listing()
	{
		$this->db->select('t_layanan.*, t_katlayanan.nama_kategori, t_katlayanan.slug_kategori,t_user.nama');
		$this->db->from('t_layanan');
		//join
		$this->db->join('t_katlayanan', 't_katlayanan.id_katlayanan = t_layanan.id_katlayanan', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_layanan.id_user', 'LEFT');
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// function select_where($select, $table, $where)
	// {
	// 	$this->db->select($select);
	// 	$this->db->from($table);
	// 	$this->db->where($where);

	// 	return $this->db->get();
	// }
	//listing layanan
	public function home()
	{
		$this->db->select('t_layanan.*, t_katlayanan.nama_kategori, t_katlayanan.slug_kategori,t_user.nama');
		$this->db->from('t_layanan');
		//join
		$this->db->join('t_katlayanan', 't_katlayanan.id_katlayanan = t_layanan.id_katlayanan', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_layanan.id_user', 'LEFT');
		$this->db->where('t_layanan.status_layanan', 'Publish');
		$this->db->order_by('id_layanan','DESC');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}
	//result for all data
	//row for single
	//detail layanan
	public function detail($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('t_layanan');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->order_by('id_layanan');
		$query = $this->db->get();
		return $query->row();
	}

	
	//Tambah layanan
	public function tambah($data)
	{
		$this->db->insert('t_layanan', $data);
	}


	//Edit layanan
	public function edit($data)
	{
		$this->db->where('id_layanan', $data['id_layanan']);
		$this->db->update('t_layanan', $data);
	}

	//delete layanan
	public function delete($data)
	{
		$this->db->where('id_layanan', $data['id_layanan']);
		$this->db->delete('t_layanan', $data); 
	}

}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */