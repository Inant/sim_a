<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahun extends CI_Model
{

  function getTahun()
  {
    return $this->db->get('tahun_akademik')->result();
  }
  function input_data($data, $table){

    $this->db->insert($table, $data);
  }
  function edit_data($where)
  {
    return $this->db->get_where('tahun_akademik', $where)->result();
  }
  function updateTahun($where, $data)
  {
      $this->db->where($where);
      if ($this->db->update('tahun_akademik', $data) == TRUE) {
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
