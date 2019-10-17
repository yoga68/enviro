<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('katlayanan_model');
		$this->load->model('galeri_model');
	}

	public function index()
	{
		$galeri = $this->galeri_model->listing();
		$katlayanan = $this->katlayanan_model->listing();
		$data = array( 'title' =>  'Gallery Enviro Buana Cipta ('.count($galeri).')', 
 					   'galeri'  =>  $galeri,
 					   'katlayanan' => $katlayanan,
 					   'isi'   =>  'admin/galeri/v_galeri'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah galeri
	public function addgaleri()
	{
		$katlayanan = $this->katlayanan_model->listing();
		$galeri = $this->galeri_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('caption', 'Caption Photos','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			$config['upload_path']     = './assets/upload/image/galeri/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 24000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Add Photoss Enviro Buana Cipta', 
		 					   'katlayanan' => $katlayanan,
		 					   'galeri' => $galeri,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/galeri/v_galeri'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/galeri/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/galeri/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 300;
				$config['height']		 = 300;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$data = array(  'id_user'  		=> $this->session->userdata('id_user'),
								'id_katlayanan'   => $i->post('id_katlayanan'),
								'caption' 		=> $i->post('caption'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'posisi' => $i->post('posisi'),
								'tanggal_post'	=> date('Y-m-d H:i:s') 
							 );
				$this->galeri_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/gallery'),'refresh');
			}
	    }
	     $data = array( 'title' =>  'Add Photos Enviro Buana Cipta', 
 					   'katlayanan' => $katlayanan,
 					   'galeri' => $galeri,
 					   'isi'   =>  'admin/galeri'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db	
	}


	//Edit User
	public function edit_galeri($id_galeri)
	{
		$galeri = $this->galeri_model->detail($id_galeri);
		$katlayanan = $this->katlayanan_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('caption', 'Caption Photos','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			//kalau ga ubah gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']     = './assets/upload/image/galeri/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 24000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Edit Photos Enviro Buana Cipta', 
		 					   'katlayanan' => $katlayanan,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/galeri'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/galeri/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/galeri/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 300;
				$config['height']		 = 300;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				//hapus gambar lama, jika ada gambar baru
				if($galeri->gambar != ""){
					unlink('./assets/upload/image/galeri/'.$galeri->gambar);
					unlink('./assets/upload/image/thumbs/galeri/'.$galeri->gambar);
				}

				$data = array(  'id_galeri'		=> $id_galeri,
								'id_user'  		=> $this->session->userdata('id_user'),
								'id_katlayanan'   => $i->post('id_katlayanan'),
								'caption' 		=> $i->post('caption'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'posisi' => $i->post('posisi') 
							 );
				$this->galeri_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/gallery'),'refresh');
			}
	    }else{
	    	//update galeri tanpa ganti gambar
	    	$i = $this->input;
			$data = array(  'id_galeri'		=> $id_galeri,
							'id_user'  		=> $this->session->userdata('id_user'),
							'id_katlayanan'   => $i->post('id_katlayanan'),
							'caption' 		=> $i->post('caption'),
							// 'gambar' 		=> $upload_data['uploads']['file_name'],
							'posisi' => $i->post('posisi') 
						 );
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/gallery'),'refresh');
	    }}
	     $data = array( 'title' =>  'Edit Photos Enviro Buana Cipta', 
 					   'katlayanan' => $katlayanan,
 					   'galeri'  => $galeri,
 					   'isi'   =>  'admin/galeri'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db
	
	}
	//delete galeri
	public function del_galeri($id_galeri)
	{
		//protect delete
		$this->check_login->check();
		$galeri = $this->galeri_model->detail($id_galeri);
		//Hapus gambar
		if($galeri->gambar != ""){
			unlink('./assets/upload/image/galeri/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/galeri/'.$galeri->gambar);
		}
		$data = array('id_galeri' => $galeri->id_galeri );

		$this->galeri_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/gallery').'")</script>';
	}


}

/* End of file Gallery.php */
/* Location: ./application/controllers/admin/Gallery.php */