<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_jam_kbm extends CI_Model
{
  private $_table='jam_pelajaran';
  public function getJamPelajaran(){
    return $this->db->get("jam_pelajaran")->result();
  }

  function get1JamPelajaran($where)
  {
    return $this->db->get_where($this->_table, $where)->result();
  }

  public function countJamPelajaran($where){
    return $this->db->get_where($this->_tabel,$where)->num_rows();
  }
  function addJamPelajaran($data)
  {
    if ($this->db->insert($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  function updateJamPelajaran($where, $data)
  {
    $this->db->where($where);
    if ($this->db->update($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function deleteJam($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}


?>
