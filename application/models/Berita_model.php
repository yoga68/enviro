<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {
	//load db

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing berita
	public function listing()
	{
		$this->db->select('t_berita.*, t_katberita.nama_kategori, t_katberita.slug_kategori, t_user.nama');
		$this->db->from('t_berita');
		//join
		$this->db->join('t_katberita', 't_katberita.id_katberita = t_berita.id_katberita', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user', 'LEFT');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function home()
	{
		$this->db->select('t_berita.*, t_katberita.nama_kategori, t_katberita.slug_kategori, t_user.nama');
		$this->db->from('t_berita');
		//join
		$this->db->join('t_katberita', 't_katberita.id_katberita = t_berita.id_katberita', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user', 'LEFT');
		$this->db->where(array('status_berita' => 'Publish' , 'jenis_berita' => 'Berita' ));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}
	//result for all data
	public function listhome()
	{
		$this->db->select('t_berita.*, t_katberita.nama_kategori, t_katberita.slug_kategori, t_user.nama');
		$this->db->from('t_berita');
		//join
		$this->db->join('t_katberita', 't_katberita.id_katberita = t_berita.id_katberita', 'LEFT');
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user', 'LEFT');
		$this->db->where(array('status_berita' => 'Publish' , 'jenis_berita' => 'Berita' ));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//row for single
	//detail berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('t_berita');
		$this->db->where('id_berita', $id_berita);
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

	//login berita
	public function login($beritaname, $password)
	{
		$this->db->select('*');
		$this->db->from('t_berita');
		$this->db->where(array('beritaname' => $beritaname , 'password' => sha1($password)));
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah berita
	public function tambah($data)
	{
		$this->db->insert('t_berita', $data);
	}


	//Edit berita
	public function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('t_berita', $data);
	}

	//delete berita
	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('t_berita', $data); 
	}

}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */