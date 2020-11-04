<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelompok_mapel extends CI_Model
{
  private $_table='kelompok_mapel';
  public function getKelompokMapel(){
    return $this->db->get("kelompok_mapel")->result();
  }

  function get1KelompokMapel($where)
  {
    return $this->db->get_where($this->_table, $where)->result();
  }

  public function countKelompokMapel($where){
    return $this->db->get_where($this->_tabel,$where)->num_rows();
  }
  function addKelompokMapel($data)
  {
    if ($this->db->insert($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  function updateKelompokMapel($where, $data)
  {
    $this->db->where($where);
    if ($this->db->update($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function deleteKelompokMapel($where)
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
