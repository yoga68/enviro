<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$user    = $this->user_model->detail($id_user);

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
		$data = array( 'title' =>  'Update Profil : '.$user->nama,
					   'user'  =>  $user,
 					   'isi'   =>  'admin/profil/list'
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
			echo '<script type="text/javascript">alert("Data Berhasil Diupdate");window.location.replace("'.base_url('admin/profil').'")</script>';
		}
		//End db
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */