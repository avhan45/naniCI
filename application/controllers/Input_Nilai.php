<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_Nilai extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('NilaiModel');
        $this->load->model('GuruModel');
        $this->load->model('KriteriaModel');
        $this->load->model('CripsModel');
    }

    public function index(){
        $data['nilai'] = $this->NilaiModel->getNilai();
        $data['page'] = 'Input Nilai Guru';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('input_nilai',$data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['guru'] = $this->GuruModel->getGuru();
        $data['kriteria'] = $this->KriteriaModel->getAll();
        $data['crips'] = $this->CripsModel->getCrips();
        $data['page'] = 'Tambah Data Nilai';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('tambah_nilai');
        $this->load->view('template/footer');

    }

    public function tambah_proses(){
        $nilai = $this->input->post('bobot');
        if($nilai == 'A'){
            $nilai = 5;
        }else if($nilai == 'B'){
            $nilai = 4;
        }else if($nilai == 'C'){
            $nilai = 3;
        }else if($nilai == 'D'){
            $nilai = 2;
        }else{
            $nilai = 1;
        }
       $data = [
        'id_guru'       => $this->input->post('guru'),
        'id_kriteria'   => $this->input->post('kriteria'),
        'id_crips'      => $this->input->post('id_crips'),
        'nilai'         => $nilai
       ];
    //    var_dump($nilai);die();
        $this->db->insert('nilai',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Tambahkan</div>');
        redirect('Input_Nilai');
    }
    
    public function edit($id){
        $data['nilai'] = $this->NilaiModel->getById($id);
        $data['guru'] = $this->GuruModel->getGuru();
        $data['kriteria'] = $this->KriteriaModel->getAll();
        $data['crips'] = $this->CripsModel->getCrips();
        $data['dtcrips'] = $this->NilaiModel->getDtcrips($id);
        $data['page'] = 'Edit Nilai';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('edit_nilai', $data);
        $this->load->view('template/footer');
    }

    public function updateNilai(){
        $id = $this->input->post('id');
        $nilai = $this->input->post('bobot');
        if($nilai == 'A'){
            $nilai = 5;
        }else if($nilai == 'B'){
            $nilai = 4;
        }else if($nilai == 'C'){
            $nilai = 3;
        }else if($nilai == 'D'){
            $nilai = 2;
        }else{
            $nilai = 1;
        }
        $data = [
            'id_guru'       => $this->input->post('guru'),
            'id_kriteria'   => $this->input->post('kriteria'),
            'id_crips'      => $this->input->post('id_crips'),
            'nilai'         => $nilai
        ];
        // var_dump($data);die();   
        $this->db->where('id_nilai', $id);
        $this->db->update('nilai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-black" role="alert">Data Berhasil di Update</div>');
        redirect('Input_Nilai');
    }

    public function delete($id){
        $this->db->where('id_nilai', $id);
        $this->db->delete('nilai');
         $this->session->set_flashdata('message', '<div class="alert alert-danger text-black" role="alert">Data Berhasil di Hapus</div>');
        redirect('Input_Nilai');
    }
    public function tampildata(){
        $id = $this->input->post('kriteria');
        $data = $this->NilaiModel->getTampilData($id);
        foreach($data as $key => $value){
            $sub = $value['crips'];
            $ket = $value['keterangan'];
            $id_crips = $value['id_crips'];

            echo '<tr>';
            echo '<td style="padding-right:10px;"><input type="radio" name="bobot" value="'.$ket.'" id="'.$key.'"></td>';
            echo '<td><input type="hidden" name="id_crips" value="'.$id_crips.'"></td>';
            echo '<td id="crips"><label for="'.$key.'">'.$sub.'</label></td>';
            echo '</tr>';

        }
       
    }
}