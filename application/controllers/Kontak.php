<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('katberita_model');
	}
	public function index()
	{
		$berita = $this->berita_model->home();
		$katberita = $this->katberita_model->listing();
		$data = array('title' => 'Contact Enviro Buana Cipta',
					  'berita' => $berita,
					  'katberita' => $katberita,
					  'isi'   => 'kontak/list'
	                 );		
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */