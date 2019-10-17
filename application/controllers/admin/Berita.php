<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('katberita_model');
		$this->load->model('berita_model');
	}

	public function index()
	{
		$berita = $this->berita_model->listing();
		$katberita = $this->katberita_model->listing();
		$data = array( 'title' =>  'News On Enviro Buana Cipta ('.count($berita).')', 
 					   'berita'  =>  $berita,
 					   'katberita' => $katberita,
 					   'isi'   =>  'admin/berita/news'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah berita
	public function addnews()
	{
		$katberita = $this->katberita_model->listing();
		$berita = $this->berita_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('judul_berita', 'Judul Berita','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('isi_berita', 'Isi Berita','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			$config['upload_path']     = './assets/upload/image/news/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 124000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Add News Enviro Buana Cipta', 
		 					   'katberita' => $katberita,
		 					   'berita' => $berita,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/berita/news'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/news/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/news/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 400;
				$config['height']		 = 400;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$data = array(  'id_user'  		=> $this->session->userdata('id_user'),
								'id_katberita'   => $i->post('id_katberita'),
								'slug_berita'   => url_title($this->input->post('judul_berita'), 'dash', TRUE),
								'judul_berita'  => $i->post('judul_berita'),
								'isi_berita'    => $i->post('isi_berita'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'status_berita' => $i->post('status_berita'),
								'jenis_berita'  => $i->post('jenis_berita'),
								'keywords' 		=> $i->post('keywords'),
								'tanggal_post'	=> date('Y-m-d H:i:s') 
							 );
				$this->berita_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/berita'),'refresh');
			}
	    }
	     $data = array( 'title' =>  'Add News Enviro Buana Cipta', 
 					   'katberita' => $katberita,
 					   'berita' => $berita,
 					   'isi'   =>  'admin/berita'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db	
	}


	//Edit User
	public function edit_news($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);
		$katberita = $this->katberita_model->listing();
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('judul_berita', 'Judul Berita','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('isi_berita', 'Isi Berita','required',
		   array('required' => '%s harus diisi !'));

		if($valid->run()){
			//kalau ga ubah gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']     = './assets/upload/image/news/';
			$config['allowed_types']   = 'jpg|jpeg|gif|png|PNG|JPG';
			$config['max_size']		   = 124000;
			$config['max_width']	   = 8000;
			$config['max_height']	   = 8000;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
					//end validasi
				$data = array( 'title' =>  'Edit News Enviro Buana Cipta', 
		 					   'katberita' => $katberita,
		 					   'error_upload' => $this->upload->display_errors(),
		 					   'isi'   =>  'admin/berita/news'
			                 );

				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk db
			}else{
				//proses manipulasi gambar
				$upload_data = array('uploads' => $this->upload->data());
				//gambar asli disimpan difolder assets/upload/image
				//manipulasi disimpan difolder assets/upload/image/thumbs
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './assets/upload/image/news/'.$upload_data['uploads']['file_name'];
				//GAMBAR baru
				$config['new_image']	 = './assets/upload/image/thumbs/news/'.$upload_data['uploads']['file_name'];
				$config['create_thumb']	 = TRUE;
				$config['maintain_ratio']= TRUE;
				$config['width']		 = 400;
				$config['height']		 = 400;
				$config['thumb_marker']  = '';

				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				//hapus gambar lama, jika ada gambar baru
				if($berita->gambar != ""){
					unlink('./assets/upload/image/news/'.$berita->gambar);
					unlink('./assets/upload/image/thumbs/news/'.$berita->gambar);
				}

				$data = array(  'id_berita'		=> $id_berita,
								'id_user'  		=> $this->session->userdata('id_user'),
								'id_katberita'   => $i->post('id_katberita'),
								'slug_berita'   => url_title($this->input->post('judul_berita'), 'dash', TRUE),
								'judul_berita'  => $i->post('judul_berita'),
								'isi_berita'    => $i->post('isi_berita'),
								'gambar' 		=> $upload_data['uploads']['file_name'],
								'status_berita' => $i->post('status_berita'),
								'jenis_berita'  => $i->post('jenis_berita'),
								'keywords' 		=> $i->post('keywords') 
							 );
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/berita'),'refresh');
			}
	    }else{
	    	//update berita tanpa ganti gambar
	    	$i = $this->input;
			$data = array(  'id_berita'		=> $id_berita,
							'id_user'  		=> $this->session->userdata('id_user'),
							'id_katberita'   => $i->post('id_katberita'),
							'slug_berita'   => url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'  => $i->post('judul_berita'),
							'isi_berita'    => $i->post('isi_berita'),
							// 'gambar' 		=> $upload_data['uploads']['file_name'],
							'status_berita' => $i->post('status_berita'),
							'jenis_berita'  => $i->post('jenis_berita'),
							'keywords' 		=> $i->post('keywords') 
						 );
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/berita'),'refresh');
	    }}
	     $data = array( 'title' =>  'Edit News Enviro Buana Cipta', 
 					   'katberita' => $katberita,
 					   'berita'  => $berita,
 					   'isi'   =>  'admin/berita'
	                 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//End db
	
	}
	//delete berita
	public function del_news($id_berita)
	{
		//protect delete
		$this->check_login->check();
		$berita = $this->berita_model->detail($id_berita);
		//Hapus gambar
		if($berita->gambar != ""){
			unlink('./assets/upload/image/news/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/news/'.$berita->gambar);
		}
		$data = array('id_berita' => $berita->id_berita );

		$this->berita_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/berita').'")</script>';
	}


	public function katberita()
	{
		$katberita = $this->katberita_model->listing();

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|is_unique[t_katberita.nama_kategori]',
			array('required' => '%s harus diisi !' ,
				  'is_unique'=> '%s <strong>'.$this->input->post('nama_kategori').'</strong> sudah ada. Buat kategori baru !'
			     )
		);
		if($this->form_validation->run() == FALSE){
			//end validasi
			$data = array('title'    => 'News Category Enviro Buana Cipta ('.count($katberita).')', 
						  'katberita' => $katberita,
						  'isi'      => 'admin/berita/katberita'
						 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	    //masuk db
	    }else{
	    	$i = $this->input;
	    	$slug_kategori = url_title($this->input->post('nama_kategori'),'dash', TRUE);

			$data = array(  'slug_kategori'		=> $slug_kategori,
							'nama_kategori'     => $i->post('nama_kategori'),
							'urutan'    		=> $i->post('urutan') 
						 );
			$this->katberita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/berita/katberita'),'refresh');
	    }
	    //end masuk db
	}

	public function edit_katberita($id_katberita)
	{
		$katberita = $this->katberita_model->detail($id_katberita);

		//validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required',
			array('required' => '%s harus diisi !' 
			     )
		);
		if($this->form_validation->run() == FALSE){
			//end validasi
			$data = array('title'    => 'News Category Enviro Buana Cipta ('.count($kategori).')', 
						  'katberita' => $katberita,
						  'isi'      => 'admin/berita/kategori'
						 );
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	    //masuk db
	    }else{
	    	$i = $this->input;
	    	$slug_kategori = url_title($this->input->post('nama_kategori'),'dash', TRUE);

			$data = array(  'id_katberita'       => $id_katberita,
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori'     => $i->post('nama_kategori'),
							'urutan'    		=> $i->post('urutan') 
						 );
			$this->katberita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/berita/kategori'),'refresh');
	    }
	    //end masuk db
	}

	public function del_katberita($id_katberita)
	{
		//protect delete
		$this->check_login->check();
		$katberita = $this->katberita_model->detail($id_katberita);
		$data = array('id_katberita' => $katberita->id_katberita );

		$this->katberita_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/berita/katberita').'")</script>';
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */