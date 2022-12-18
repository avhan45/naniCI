<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiModel extends CI_Model {


    public function getAll() {
        $query = $this->db->get('nilai');
        return $query->result();
    }

    public function getNilai(){
        $this->db->select('*');
        $this->db->from('nilai a');
        $this->db->join('guru b', 'a.id_guru=b.id_guru');
        $this->db->join('kriteria c', 'a.id_kriteria=c.id_kriteria');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from('nilai a');
        $this->db->join('guru b', 'a.id_guru=b.id_guru');
        $this->db->join('kriteria c', 'a.id_kriteria = c.id_kriteria');
        $this->db->where('a.id_nilai', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function Nilai(){
        $this->db->select('*');
        $this->db->from('nilai a');
        $this->db->join('kriteria c', 'a.id_kriteria=c.id_kriteria');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTampilData($id){
        $this->db->select('*');
        $this->db->from('crips a');
        $this->db->where('a.id_kriteria',$id);
        $this->db->order_by('a.id_crips', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
 
    public function getDtcrips($id){
        $this->db->select('*');
        $this->db->from('nilai a');
        $this->db->join('crips b', 'a.id_crips = b.id_crips');
        $this->db->where('a.id_nilai', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
}