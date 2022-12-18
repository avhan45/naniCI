<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('username');
        if(!$user){
            redirect('login');
        }
    }

	public function index()
	{
        $data['page'] = "Home";
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('home');
		$this->load->view('template/footer');
        
	}
}
