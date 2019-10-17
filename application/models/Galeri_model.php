<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {
	//load db

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing galeri
	public function listing()
	{
		$this->db->select('t_galeri.*, t_katlayanan.nama_kategori, t_katlayanan.slug_kategori,t_user.nama');
		$this->db->from('t_galeri');
		//join
		$this->db->join('t_katlayanan', 't_katlayanan.id_katlayanan = t_galeri.id_katlayanan', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_galeri.id_user', 'LEFT');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//listing galeri
	public function slider()
	{
		$this->db->select('t_galeri.*, t_katlayanan.nama_kategori, t_katlayanan.slug_kategori,t_user.nama');
		$this->db->from('t_galeri');
		//join
		$this->db->join('t_katlayanan', 't_katlayanan.id_katlayanan = t_galeri.id_katlayanan', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_galeri.id_user', 'LEFT');
		$this->db->where('t_galeri.posisi', 'Gallery');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	//result for all data
	//row for single
	//detail galeri
	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('t_galeri');
		$this->db->where('id_galeri', $id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}

	
	//Tambah galeri
	public function tambah($data)
	{
		$this->db->insert('t_galeri', $data);
	}


	//Edit galeri
	public function edit($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->update('t_galeri', $data);
	}

	//delete galeri
	public function delete($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->delete('t_galeri', $data); 
	}

}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */