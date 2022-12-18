<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KriteriaModel extends CI_Model {

    public function getAll(){
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function getById($id){
        $this->db->where('id_kriteria',$id);
        $query = $this->db->get('kriteria');
        return $query->result();
    }
    
}
