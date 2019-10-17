<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	//load login page
	public function index()
	{
		//validasi
		$valid = $this->form_validation;

		$valid ->set_rules('username', 'Username','required|trim|min_length[6]|max_length[32]',
		   array('required' => '%s harus diisi !',
		   		 'min_length' => '%s minimal 6 karakter !',
		   		 'max_length' => '%s maksimal 32 karakter !'));
		$valid ->set_rules('password', 'Password','required|trim|min_length[6]',
		   array('required' => '%s harus diisi !',
		   		 'min_length' => '%s minimal 6 karakter !'));

		if($valid->run()){
			$username       = $this->input->post('username');
			$password       = $this->input->post('password');
			//compare dengan db
			$check_login    = $this->user_model->login($username,$password);
			//kalau ada record create session
			if(count($check_login) == 1){
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('username', $check_login->username);
				$this->session->set_userdata('nama', $check_login->nama);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_flashdata('sukses', 'Anda berhasil login !');
				redirect(base_url('admin/dasbor'),'refresh');

			}else{
				//Kalau ga cocok diredirect ke login
				$this->session->set_flashdata('sukses', 'Username atau Password tidak sesuai');
				redirect(base_url('login'),'refresh');
			}
		}

		//end validasi
		$data = array('title' => 'Login Administrator');
		$this->load->view('admin/login/list', $data, FALSE);
	}

	public function logout()
	{
		$this->check_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./a$this->session->setuserdata('id_user', $check_login->id_user);pplication/controllers/Login.php */