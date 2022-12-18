<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KriteriaModel');
        $this->load->model('GuruModel');
        $this->load->model('NilaiModel');
        $this->load->model('HasilModel');
    }

    public function index()
    {
        $data['kriteria'] = $this->KriteriaModel->getAll();
        $data['guru'] = $this->GuruModel->getGuru();
        // $data['nilai'] = $this->NilaiModel->Nilai();
        $data['nilai'] = $this->HasilModel->getNilai();
        $data['normalisasi'] = $this->HasilModel->getNormalisasi();
        $data['page'] = 'Hasil';
        $this->load->view('template/header');
        $this->load->view('template/sidebar',$data);
        $this->load->view('hasil',$data);
        $this->load->view('template/footer');
        
    }

    public function normalisasi(){
        
        $query = $this->db->query("SELECT DISTINCT nilai.id_guru,nilai.id_kriteria FROM nilai,kriteria,guru WHERE kriteria.id_kriteria=nilai.id_kriteria AND guru.id_guru=nilai.id_guru");
        foreach($query->result() as $row){
            $id_g = $row->id_guru;
            $id_k = $row->id_kriteria;

            $query2 = $this->db->query("SELECT kriteria.kriteria,attribut, MAX(nilai.nilai) as hasilmax FROM nilai,kriteria,guru WHERE kriteria.id_kriteria=nilai.id_kriteria AND kriteria.id_kriteria='$id_k'");
            foreach($query2->result() as $max){
                $query3 = $this->db->query("SELECT nilai FROM nilai WHERE id_kriteria='$id_k' AND id_guru='$id_g'");
                foreach($query3->result() as $nilai){
                    if($max->attribut == 'benefit'){
                        $nilai_normalisasi = number_format($nilai->nilai / $max->hasilmax,2);
                    }else{
                        $query4 = $this->db->query("SELECT kriteria.nama_kriteria,attribut, MIN(nilai.nilai) as hasilmax FROM nilai,kriteria,guru WHERE kriteria.id_kriteria=nilai.id_kriteria AND kriteria.id_kriteria='$id_k'");
                        foreach($query4->result() as $min){
                            $nilai_normalisasi = number_format($nilai->nilai / $min->hasilmax,2);
                        }
                    }

                    $cek = $this->db->query("SELECT * FROM normalisasi WHERE id_guru='$row->id_guru' AND id_kriteria='$row->id_kriteria' AND nilai_normalisasi = '$nilai_normalisasi'");
                    $ck = $cek->num_rows();
                    if($ck == 0){
                        $this->db->query("INSERT INTO normalisasi (id_guru, id_kriteria,nilai_normalisasi) VALUES ('$id_g','$id_k','$nilai_normalisasi')");

                    }elseif($ck == 1){
                        echo "<script>alert('Normalisasi Sudah di Lakukan');
                        window.location.href='".base_url('hasil')."';
                        </script>";
                    }

                }
            }
        }
        redirect('hasil');
    }
    
    public function deleteNormalisasi(){
        $this->db->from('normalisasi');
        $this->db->truncate();
        return redirect('hasil');
    }

    public function analisa(){
        $query = $this->db->query("SELECT normalisasi.id_kriteria,normalisasi.id_guru,bobot FROM normalisasi,kriteria, guru WHERE normalisasi.id_kriteria=kriteria.id_kriteria AND normalisasi.id_guru=guru.id_guru");
        foreach($query->result() as $r){
            $id_k = $r->id_kriteria;
            $id_g = $r->id_guru;
            $bobot= $r->bobot;

            $query2 = $this->db->query("SELECT nilai_normalisasi FROM normalisasi WHERE id_guru='$id_g' AND id_kriteria='$id_k'");
            foreach($query2->result() as $rr){
                $nilai_n = $rr->nilai_normalisasi;
                $b = $bobot / 100;
                $h = $nilai_n * $b;

                $cek = $this->db->query("SELECT * FROM perhitungan WHERE id_guru='$id_k' AND id_kriteria='$id_k' AND nilai_perhitungan='$h' ");
                $ck = $cek->num_rows();
                if($ck == 0){
                    $this->db->query("INSERT INTO perhitungan (id_guru, id_kriteria, nilai_perhitungan) VALUES ('$id_g','$id_k','$h') ");
                }elseif($ck == 1){
                    echo "<script>
                    alert('Analisa Sudah diLakukan');
                    window.location.href='".base_url('hasil')."';
                    </script>
                    ";
                }
            }
        }
        return redirect('hasil');
    }

    public function deleteAnalisa(){
        $this->db->from('perhitungan');
        $this->db->truncate();
        return redirect('hasil');
    }
}