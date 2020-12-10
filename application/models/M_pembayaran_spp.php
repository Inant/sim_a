<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran_spp extends CI_Model
{

  function insert($table, $data){

    $this->db->insert($table, $data);
  }

  function update($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }

  function delete($table, $where){
    $this->db->where($where);
    $this->db->delete($table);
  }
  // function edit_data($where)
  // {
  //   return $this->db->get_where('spp', $where)->result();
  // }
  // function updateSpp($where, $data)
  // {
  //     $this->db->where($where);
  //     if ($this->db->update('spp', $data) == TRUE) {
  //         return TRUE;
  //     } else {
  //         return FALSE;
  //     }
  // }
  // function hapus_data($where,$table){
  //   $this->db->where($where);
  //   $this->db->delete($table);
  // }

}


?>
