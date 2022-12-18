<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruModel extends CI_Model {

    public function getGuru(){
        $query = $this->db->get('guru');
        return $query->result();
    }
    public function getById($id)
    {
        $this->db->where('id_guru', $id);
        $query = $this->db->get('guru');
        return $query->result();
    }
}
