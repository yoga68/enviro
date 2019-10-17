<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
	}
	//main page
	public function index()
	{
		$data  = array('title' => 'Services Enviro Buana Cipta',
					   'isi'   => 'layanan/list'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail page
	public function read()
	{
		$layanan = $this->layanan_model->home();
		$data  = array('title' => 'Services Detail',
					   'layanan' => $layanan,
					   'isi'   => 'layanan/read'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */