<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	//load db
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	//listing data
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array( 'title' =>  'Data User Administrator ('.count($user).')', 
 					   'user'  =>  $user,
 					   'isi'   =>  'admin/user/list'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah User
	public function tambah()
	{
		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('nama', 'Nama','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('email', 'Email','required|valid_email',
		   array('required' => '%s harus diisi !',
		   		 'valid_email' => 'Format %s tidak valid'
				));
		$valid ->set_rules('username', 'Username','required|trim|min_length[6]|max_length[32]|is_unique[t_user.username]',
		   array('required' => '%s harus diisi !',
		   		 'min_length' => '%s minimal 6 karakter !',
		   		 'max_length' => '%s maksimal 32 karakter !',
		   		 'is_unique'  => '%s <strong>'.$this->input->post('username').'</strong> sudah digunakan. Buat username baru !'
				));
		$valid ->set_rules('password', 'Password','required|trim|min_length[6]',
		   array('required' => '%s harus diisi !',
		   		 'min_length' => '%s minimal 6 karakter !'
				));
		if($valid->run() == FALSE){
			//end validasi
		$data = array( 'title' =>  'Tambah User Administrator', 
 					   'isi'   =>  'admin/user/tambah'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk db
		}else{
			$i = $this->input;
			$data = array(  'nama'     => $i->post('nama'),
							'email'    => $i->post('email'),
							'username' => $i->post('username'),
							'password' => sha1($i->post('password')),
							'akses_level' => $i->post('akses_level') 
						 );
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		//End db	
	}


	//Edit User
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		// validasi
		$valid = $this->form_validation;
		$valid ->set_rules('nama', 'Nama','required',
		   array('required' => '%s harus diisi !'));
		$valid ->set_rules('email', 'Email','required|valid_email',
		   array('required' => '%s harus diisi !',
		   		 'valid_email' => 'Format %s tidak valid'
				));
		$valid ->set_rules('password', 'Password','required|trim|min_length[6]',
		   array('required' => '%s harus diisi !',
		   		 'min_length' => '%s minimal 6 karakter !'
				));
		if($valid->run() == FALSE){
			//end validasi
		$data = array( 'title' =>  'Edit User Administrator : '.$user->nama,
					   'user'  =>  $user,
 					   'isi'   =>  'admin/user/edit'
	                 );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk db
		}else{
			$i = $this->input;
			$data = array(  'id_user'  => $id_user,
 							'nama'     => $i->post('nama'),
							'email'    => $i->post('email'),
							'username' => $i->post('username'),
							'password' => sha1($i->post('password')),
							'akses_level' => $i->post('akses_level') 
						 );
			$this->user_model->edit($data);
			echo '<script type="text/javascript">alert("Data Berhasil Diupdate");window.location.replace("'.base_url('admin/user').'")</script>';
		}
		//End db	
	}
	//delete user
	public function delete($id_user)
	{
		//protect delete
		$this->check_login->check();
		$user = $this->user_model->detail($id_user);
		$data = array('id_user' => $user->id_user );

		$this->user_model->delete($data);
		echo '<script type="text/javascript">alert("Data Berhasil Dihapus !");window.location.replace("'.base_url('admin/user').'")</script>';
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */