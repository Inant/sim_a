<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_identitas_sekolah extends CI_Model
{
  private $table='sekolah_info';
  function getIdentitas_sekolah()
  {
    $this->db->select('*');
      $this->db->from($this->table);
      return $this->db->get();
  }
  function edit_data($where, $table)
  {
      return $this->db->get_where($table, $where);
  }
  function update_data($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }
}
?>
