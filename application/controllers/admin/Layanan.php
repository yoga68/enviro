<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('katlayanan_model');
		$this->load->model('layanan_model');
	}

	public function index()
	{
		$layanan = $this->layanan_model->listing();
		$katlayanan = $this->katlayanan_model->listing();
		$data = array( 'title' =>  'Services Enviro Buana Cipta ('.count($layanan).')', 
 					   'layanan'  =>  $layanan,
 					   'katlayanan' => $katlayanan,
 					   'isi'   =>  'admin/layanan/services'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah layanan
	public function addservices()
	{
		$katlayanan = $this->katlayanan_model->listing();
		$layanan = $this->layanan_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('judul_layanan', 'Judul Layanan','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('isi_layanan', 'Isi Layanan','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			$config['upload_path']     = './assets/upload/image/services/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 124000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Add Services Enviro Buana Cipta', 
		 					   'katlayanan' => $katlayanan,
		 					   'layanan'  => $layanan,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/layanan/services'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/services/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/services/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 400;
				$config['height']		 = 400;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$data = array(  'id_user'  		=> $this->session->userdata('id_user'),
								'id_katlayanan'   => $i->post('id_katlayanan'),
								'slug_layanan'   => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
								'judul_layanan'  => $i->post('judul_layanan'),
								'isi_layanan'    => $i->post('isi_layanan'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'status_layanan' => $i->post('status_layanan'),
								'keywords' 		=> $i->post('keywords'),
								'tanggal_post'	=> date('Y-m-d H:i:s') 
							 );
				$this->layanan_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/layanan'),'refresh');
			}
	    }
	     $data = array( 'title' =>  'Add Services Enviro Buana Cipta', 
 					   'katlayanan' => $katlayanan,
 					   'layanan' => $layanan,
 					   'isi'   =>  'admin/layanan'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db	
	}


	//Edit User
	public function edit_services($id_layanan)
	{
		$layanan = $this->layanan_model->detail($id_layanan);
		$katlayanan = $this->katlayanan_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('judul_layanan', 'Judul Layanan','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('isi_layanan', 'Isi Layanan','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			//kalau ga ubah gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']     = './assets/upload/image/services/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 124000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Edit Services Enviro Buana Cipta', 
		 					   'katlayanan' => $katlayanan,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/layanan/services'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/services/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/services/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 400;
				$config['height']		 = 400;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				//hapus gambar lama, jika ada gambar baru
				if($layanan->gambar != ""){
					unlink('./assets/upload/image/services/'.$layanan->gambar);
					unlink('./assets/upload/image/thumbs/services/'.$layanan->gambar);
				}

				$data = array(  'id_layanan'		=> $id_layanan,
								'id_user'  		=> $this->session->userdata('id_user'),
								'id_katlayanan'   => $i->post('id_katlayanan'),
								'slug_layanan'   => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
								'judul_layanan'  => $i->post('judul_layanan'),
								'isi_layanan'    => $i->post('isi_layanan'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'status_layanan' => $i->post('status_layanan'),
								'keywords' 		=> $i->post('keywords') 
							 );
				$this->layanan_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/layanan'),'refresh');
			}
	    }else{
	    	//update layanan tanpa ganti gambar
	    	$i = $this->input;
			$data = array(  'id_layanan'		=> $id_layanan,
							'id_user'  		=> $this->session->userdata('id_user'),
							'id_katlayanan'   => $i->post('id_katlayanan'),
							'slug_layanan'   => url_title($this->input->post('judul_layanan'), 'dash', TRUE),
							'judul_layanan'  => $i->post('judul_layanan'),
							'isi_layanan'    => $i->post('isi_layanan'),
							// 'gambar' 		=> $upload_data['uploads']['file_name'],
							'status_layanan' => $i->post('status_layanan'),
							'keywords' 		=> $i->post('keywords') 
						 );
			$this->layanan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/layanan'),'refresh');
	    }}
	     $data = array( 'title' =>  'Edit Services Enviro Buana Cipta', 
 					   'katlayanan' => $katlayanan,
 					   'layanan'  => $layanan,
 					   'isi'   =>  'admin/layanan'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db
	
	}
	//delete layanan
	public function del_services($id_layanan)
	{
		//protect delete
		$this->check_login->check();
		$layanan = $this->layanan_model->detail($id_layanan);
		//Hapus gambar
		if($layanan->gambar != ""){
			unlink('./assets/upload/image/services/'.$layanan->gambar);
			unlink('./assets/upload/image/thumbs/services/'.$layanan->gambar);
		}
		$data = array('id_layanan' => $layanan->id_layanan );

		$this->layanan_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/layanan').'")</script>';
	}


	public function katlayanan()
	{
		$katlayanan = $this->katlayanan_model->listing();

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|is_unique[t_katlayanan.nama_kategori]',
			array('required' => '%s harus diisi !' ,
				  'is_unique'=> '%s <strong>'.$this->input->post('nama_kategori').'</strong> sudah ada. Buat kategori baru !'
			     )
		);
		if($this->form_validation->run() == FALSE){
			//end validasi
			$data = array('title'    => 'Services Category Enviro Buana Cipta ('.count($katlayanan).')', 
						  'katlayanan' => $katlayanan,
						  'isi'      => 'admin/layanan/katlayanan'
						 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	    //masuk db
	    }else{
	    	$i = $this->input;
	    	$slug_kategori = url_title($this->input->post('nama_kategori'),'dash', TRUE);

			$data = array(  'slug_kategori'		=> $slug_kategori,
							'nama_kategori'     => $i->post('nama_kategori'),
							'isi_katlayanan'    => $i->post('isi_katlayanan'),
							'urutan'    		=> $i->post('urutan') 
						 );
			$this->katlayanan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/layanan/katlayanan'),'refresh');
	    }
	    //end masuk db
	}

	public function edit_katlayanan($id_katlayanan)
	{
		$katlayanan = $this->katlayanan_model->detail($id_katlayanan);

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required',
			array('required' => '%s harus diisi !' 
			     )
		);
		if($this->form_validation->run() == FALSE){
			//end validasi
			$data = array('title'    => 'Services Category Enviro Buana Cipta ('.count($katlayanan).')', 
						  'katlayanan' => $katlayanan,
						  'isi'      => 'admin/layanan/kategori'
						 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	    //masuk db
	    }else{
	    	$i = $this->input;
	    	$slug_kategori = url_title($this->input->post('nama_kategori'),'dash', TRUE);

			$data = array(  'id_katlayanan'       => $id_katlayanan,
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori'     => $i->post('nama_kategori'),
							'isi_katlayanan'    => $i->post('isi_katlayanan'),
							'urutan'    		=> $i->post('urutan') 
						 );
			$this->katlayanan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/layanan/katlayanan'),'refresh');
	    }
	    //end masuk db
	}

	public function del_katlayanan($id_katlayanan)
	{
		//protect delete
		$this->check_login->check();
		$katlayanan = $this->katlayanan_model->detail($id_katlayanan);
		$data = array('id_katlayanan' => $katlayanan->id_katlayanan );

		$this->katlayanan_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/layanan/katlayanan').'")</script>';
	}

}

/* End of file Layanan.php */
/* Location: ./application/controllers/admin/Layanan.php */