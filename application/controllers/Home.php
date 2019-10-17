<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('katberita_model');
		$this->load->model('layanan_model');
		$this->load->model('galeri_model');
		$this->load->model('katlayanan_model');
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$galeri = $this->galeri_model->slider();
		$katberita = $this->katberita_model->listing();
		$layanan = $this->layanan_model->home();
		$berita = $this->berita_model->home();
		$katlayanan = $this->katlayanan_model->home();

		$data = array('title' => $konfigurasi->namaweb,
		              'gambarcon' => $konfigurasi->logo,
					  'keywords' => $konfigurasi->namaweb.'-'.$konfigurasi->tagline.'-'.$konfigurasi->keywords,
					  'deskripsi' => $konfigurasi->deskripsi,
					  'galeri' => $galeri,
					  'berita' => $berita,
					  'layanan' => $layanan,
					  'katberita' => $katberita,
					  'katlayanan' => $katlayanan,
					  'isi'   => 'home/list'
	                 );		
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */