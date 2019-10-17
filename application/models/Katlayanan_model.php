<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katlayanan_model extends CI_Model {
	//load db

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing kategori
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('t_katlayanan');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function home()
	{
		$this->db->select('*');
		$this->db->from('t_katlayanan');
		$this->db->order_by('urutan', 'ASC');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}
	//result for all data
	//row for single
	//detail kategori
	public function detail($id_katlayanan)
	{
		$this->db->select('*');
		$this->db->from('t_katlayanan');
		$this->db->where('id_katlayanan', $id_katlayanan);
		$this->db->order_by('id_katlayanan');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah kategori
	public function tambah($data)
	{
		$this->db->insert('t_katlayanan', $data);
	}


	//Edit kategori
	public function edit($data)
	{
		$this->db->where('id_katlayanan', $data['id_katlayanan']);
		$this->db->update('t_katlayanan', $data);
	}

	//delete kategori
	public function delete($data)
	{
		$this->db->where('id_katlayanan', $data['id_katlayanan']);
		$this->db->delete('t_katlayanan', $data); 
	}

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */