<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_spp extends CI_Model
{

  function getJoinSpp ()
  {
    $this->db->select('*');
    $this->db->from ('spp');
    $this->db->join('kelas', ' spp.id_kelas= kelas.id_kelas');

    $query =$this->db->get();
    return $query->result();
  }
  function getKelas()
  {
    return $this->db->get('kelas')->result();
  }

  function input_data($data, $table){

    $this->db->insert($table, $data);
  }
  function edit_data($where)
  {
    return $this->db->get_where('spp', $where)->result();
  }
  function updateSpp($where, $data)
  {
      $this->db->where($where);
      if ($this->db->update('spp', $data) == TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
  }
  function hapus_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }

}


?>
