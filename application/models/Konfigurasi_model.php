<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	public function listing()
	{
		$query = $this->db->get('t_konfigurasi');
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('t_konfigurasi', $data);
	}	

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */