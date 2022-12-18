<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crips extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('username');
        if(!$user){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('CripsModel');
        $this->load->model('KriteriaModel');

    }

    public function index(){
        $data['page'] = "Data Crips";
        $data['crips'] = $this->CripsModel->getAll();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('crips',$data);
		$this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['page'] = "Tambah Crips";
        $data['kriteria'] = $this->KriteriaModel->getAll();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('tambah_crips',$data);
		$this->load->view('template/footer');
    }

    public function tambah_proses()
    {
        $kriteria = $this->input->post('kriteria');
        $crips = $this->input->post('crips');
        $ket = $this->input->post('ket');
        $nilai = $this->input->post('nilai');

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('crips', 'Crips', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if($this->form_validation->run() == false){
            redirect('crips/tambah');
        }else{
            $data = [
                'id_kriteria' => $kriteria,
                'crips' => $crips,
                'keterangan' => $ket,
                'nilai' => $nilai
            ];

            $this->db->insert('crips',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Tambahkan</div>');
        redirect('crips');
        }

    }

    public function edit($id){
        $data['kriteria'] = $this->KriteriaModel->getAll();
        $data['crips'] = $this->CripsModel->getById($id);
        $data['page'] = 'Edit Crips';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('edit_crips',$data);
        $this->load->view('template/footer');

    }

    public function edit_proses(){
        $id = $this->input->post('id');
        $data = [
            'id_kriteria' => $this->input->post('kriteria'),
            'crips' => $this->input->post('crips'),
            'keterangan' => $this->input->post('ket'),
            'nilai' => $this->input->post('nilai')
        ];
        $this->db->where('id_crips', $id);
        $this->db->update('crips',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di update</div>');
        redirect('crips');
    }

    public function delete($id){
        $this->db->where('id_crips',$id);
        $this->db->delete('crips');
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-black" role="alert">Data Berhasil di Hapus</div>');
        redirect('crips');
    }
}