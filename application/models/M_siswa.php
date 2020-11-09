<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{
  private $_table='siswa';
  public function getSiswa(){
    return $this->db->get("siswa")->result();
  }

  function get1Siswa($where)
  {
    return $this->db->get_where($this->_table, $where)->result();
  }
  
  function getSiswaByRombel($where)
  {
    $this->db->select('nisn, nama_siswa'); 
    $this->db->from($this->_table);   
    $this->db->where('id_rombel', $where);
    return $this->db->get()->result();
  }

  public function countSiswa($where){
    return $this->db->get_where($this->_tabel,$where)->num_rows();
  }
  function addSiswa($data)
  {
    if ($this->db->insert($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function updateSiswa($where, $data)
  {
    $this->db->where($where);
    if ($this->db->update($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function deleteSiswa($where)
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
