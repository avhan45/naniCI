<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$isLogin = $this->session->userdata('username');
		if($isLogin){
			redirect('home');
		}else{
			$this->load->view('login');
		}
	}

	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false){
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['username' => $username])->row_array();
			if($user){
				// User Ada
				if($user['password'] == $password){
					$data = [
						'username' => $user['username']
					];
					$this->session->set_userdata($data);
					redirect('home');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah</div>');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah</div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Anda Telah Logout</div>');
		redirect('login');

	}
}
