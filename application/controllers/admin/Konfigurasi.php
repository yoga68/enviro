<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses_level') != "Admin")
		{
			$this->session->set_flashdata('sukses', 'Hak akses anda tidak mencukupi');
			redirect(base_url('login/logout'),'refresh');
		}
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi
		$data = array('title' =>  'Website Configuration',
					  'konfigurasi' => $konfigurasi,
					  'isi'	=> 'admin/konfigurasi/v_konfigurasi'
					 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk db
	}
	public function configweb($id_konfigurasi)
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi
		$valid = $this->form_validation;
		$valid ->set_rules('namaweb', 'Nama Web','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			//kalau ga ubah gambar
			if(!empty($_FILES['logo']['name'])) {

			$config['upload_path']     = './assets/upload/image/company/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 124000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('logo')){
					//end validasi
				$data = array( 'title' =>  'Configuration Web Enviro Buana Cipta', 
		 					   'konfigurasi' => $konfigurasi,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/konfigurasi/v_konfigurasi'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/company/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/company/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 200;
				$config['height']		 = 200;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				//hapus gambar lama, jika ada gambar baru
				if($konfigurasi->logo != ""){
					unlink('./assets/upload/image/company/'.$konfigurasi->logo);
					unlink('./assets/upload/image/thumbs/company/'.$konfigurasi->logo);
				}

				$data = array(  'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
								'id_user'  		=> $this->session->userdata('id_user'),
								'namaweb'   => $i->post('namaweb'),
								'tagline'  => $i->post('tagline'),
								'email'    => $i->post('email'),
								'telepon'    => $i->post('telepon'),
								'website'    => $i->post('website'),
								'deskripsi'    => $i->post('deskripsi'),
								'keywords' 		=> $i->post('keywords'),
								'metatext' 		=> $i->post('metatext'),
								'map' 		    => $i->post('map'),
								'logo' 		    => $upload_data['uploads']['file_name'],
								'instagram' => $i->post('instagram')
								 
							 );
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi'),'refresh');
			}
	    }else{
	    	//update berita tanpa ganti gambar
	    	$i = $this->input;
			$data = array(  'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
							'id_user'  		=> $this->session->userdata('id_user'),
							'namaweb'   => $i->post('namaweb'),
							'tagline'  => $i->post('tagline'),
							'email'    => $i->post('email'),
							'telepon'    => $i->post('telepon'),
							'website'    => $i->post('website'),
							'deskripsi'    => $i->post('deskripsi'),
							'keywords' 		=> $i->post('keywords'),
							'metatext' 		=> $i->post('metatext'),
							'map' 		    => $i->post('map'),
							// 'logo' 		    => $upload_data['uploads']['file_name'],
							'instagram' => $i->post('instagram') 
						 );
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/konfigurasi'),'refresh');
	    }}
	     $data = array( 'title' =>  'Configuration Web Enviro Buana Cipta', 
 					   'konfigurasi' => $konfigurasi,
 					   'isi'   =>  'admin/konfigurasi'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db
	
	}

	public function moreconfig()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi
		$data = array('title' => 'More Configuration',
					  'konfigurasi' => $konfigurasi,
					  'isi'	=> 'admin/konfigurasi/v_morekonfigurasi'
					 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk db
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */