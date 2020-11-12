<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori_nilai extends CI_Model
{
  private $_table='kategori_nilai';
  public function getKategoriNilai(){
    return $this->db->get("kategori_nilai")->result();
  }

  function get1KategoriNilai($where)
  {
    return $this->db->get_where($this->_table, $where)->result();
  }

  public function countKategoriNilai($where){
    return $this->db->get_where($this->_tabel,$where)->num_rows();
  }
  function addKategoriNilai($data)
  {
    if ($this->db->insert($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  function updateKategoriNilai($where, $data)
  {
    $this->db->where($where);
    if ($this->db->update($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function deleteKategoriNilai($where)
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
