<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilModel extends CI_Model {

    public function getNilai(){
        $query = $this->db->get('nilai');
        return $query->result();
    }

    public function getNormalisasi(){
        $query = $this->db->get('normalisasi');
        return $query->result();
    }
}