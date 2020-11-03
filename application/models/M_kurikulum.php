<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kurikulum extends CI_Model
{

  function getKurikulum()
  {
    return $this->db->get('kurikulum')->result();
  }
  function input_data($data, $table){

    $this->db->insert($table, $data);
  }
  function edit_data($where)
  {
    return $this->db->get_where('kurikulum', $where)->result();
  }
  function updateKurikulum($where, $data)
  {
      $this->db->where($where);
      if ($this->db->update('kurikulum', $data) == TRUE) {
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
