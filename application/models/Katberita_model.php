<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katberita_model extends CI_Model {
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
		$this->db->from('t_katberita');
		$this->db->order_by('id_katberita', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	//result for all data
	//row for single
	//detail kategori
	public function detail($id_katberita)
	{
		$this->db->select('*');
		$this->db->from('t_katberita');
		$this->db->where('id_katberita', $id_katberita);
		$this->db->order_by('id_katberita');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah kategori
	public function tambah($data)
	{
		$this->db->insert('t_katberita', $data);
	}


	//Edit kategori
	public function edit($data)
	{
		$this->db->where('id_katberita', $data['id_katberita']);
		$this->db->update('t_katberita', $data);
	}

	//delete kategori
	public function delete($data)
	{
		$this->db->where('id_katberita', $data['id_katberita']);
		$this->db->delete('t_katberita', $data); 
	}

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */