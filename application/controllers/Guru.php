<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('username');
        if(!$user){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('GuruModel');
    }

	public function index()
	{
        $data['page'] = "Guru";
        $data['guru'] = $this->GuruModel->getGuru();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('data_guru',$data);
		$this->load->view('template/footer');
        
	}

    public function tambah()
    {

        $data['page'] = "Tambah Guru";
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('tambah_guru');
		$this->load->view('template/footer');
    }

    public function tambah_proses()
    {

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nip','Nip','required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if($this->form_validation->run() == false){
            redirect('guru/tambah');
        }else{
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->db->insert('guru', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Tambahkan</div>');
            redirect('guru');
            
        }
    }

    public function edit($id)
    {
        $data['data_guru'] = $this->GuruModel->getById($id);
        $data['page'] = 'Edit Guru';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('edit_guru', $data);
        $this->load->view('template/footer');

    }

    public function edit_proses()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');

        $data = [
            'nama' => $nama,
            'nip' => $nip,
            'alamat' => $alamat
        ];

        $this->db->where('id_guru', $id);
        $this->db->update('guru', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Update</div>');
        redirect('guru');

    }

    public function delete($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->delete('guru');
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-black" role="alert">Data Berhasil di Hapus</div>');
        redirect('guru');
    }
}
