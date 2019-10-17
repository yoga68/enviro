<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oops extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'Oops Halaman Tidak Ditemukan',
					  'isi'   => 'oops/list'
	                 );		
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */