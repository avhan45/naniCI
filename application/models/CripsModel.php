<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CripsModel extends CI_Model {

   public function getAll(){
       $this->db->select('*');
       $this->db->from('crips a');
       $this->db->join('kriteria b', 'a.id_kriteria = b.id_kriteria');
       // $this->db->group_by('a.crips');
    $query = $this->db->get();
    return $query->result();
   }

   public function getById($id){
      $this->db->select('*');
      $this->db->from('crips a');
      $this->db->join('kriteria b', 'a.id_kriteria=b.id_kriteria');
      $this->db->where('a.id_crips',$id);
      $query = $this->db->get();
      return $query->result();
   }

   public function getCrips(){
      return $this->db->get('crips')->result();
   }

}
