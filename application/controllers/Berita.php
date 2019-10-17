<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('katberita_model');
	}
	//main page
	public function index()
	{
		$katberita = $this->katberita_model->listing();
		$berita = $this->berita_model->listhome();
		$data  = array('title' => 'News Enviro Buana Cipta',
					   'katberita' => $katberita,
					   'berita' => $berita,
					   'isi'   => 'berita/list'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	
	 public function read()
	 {	
	 	$katberita = $this->katberita_model->listing();
		$berita = $this->berita_model->listhome();
	 	$data  = array('title' => 'News Detail',
	 				   'katberita' => $katberita,
	 				   'berita' => $berita,
	 				   'isi'   => 'berita/read'
	 				  );
	 	$this->load->view('layout/wrapper', $data, FALSE);
	 }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */