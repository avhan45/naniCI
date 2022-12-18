<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('username');
        if(!$user){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('KriteriaModel');

    }
    public function index(){
        
        $data['kriteria'] = $this->KriteriaModel->getAll();
        $data['page'] = "Kriteria";
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('kriteria',$data);
		$this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['page'] = "Tambah Kriteria";
        $data['kriteria'] = $this->KriteriaModel->getAll();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('tambah_kriteria',$data);
		$this->load->view('template/footer');
    }

    public function tambah_proses()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('bobot', 'bobot', 'required');

        if($this->form_validation->run() == false){
            redirect('kriteria/tambah');
        }else{
            $data = [
                'kode_kriteria' => $this->input->post('kode'),
                'kriteria' => $this->input->post('kriteria'),
                'attribut' => $this->input->post('attribut'),
                'bobot' => $this->input->post('bobot')
            ];
            $this->db->insert('kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Tambahkan</div>');
            redirect('kriteria');
        }
    }

    public function edit($id){
        
        $data['data_kriteria'] = $this->KriteriaModel->getById($id);
        $data['page'] = "Edit Kriteria";
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('edit_kriteria',$data);
		$this->load->view('template/footer');
    }
    public function edit_proses(){
        $id = $this->input->post('id');
        $data = [
            
            'kode_kriteria' => $this->input->post('kode'),
            'kriteria' => $this->input->post('kriteria'),
            'attribut' => $this->input->post('attribut'),
            'bobot' => $this->input->post('bobot')
        ];
        $this->db->where('id_kriteria', $id);
        $this->db->update('kriteria',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Update</div>');
        redirect('kriteria');
    }

    public function delete($id)
    {
        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-black" role="alert">Data Berhasil di Hapus</div>');
        redirect('kriteria');
    }
}