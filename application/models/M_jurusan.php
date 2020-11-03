<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_jurusan extends CI_Model
{
    private $_table = 'jurusan';
    function getJurusan()
    {

        $query = $this->db->select('jurusan.id_jurusan, jurusan.nama_jurusan, bidang_keahlian.nama_bidang_keahlian')
                ->from('jurusan')
                ->join('bidang_keahlian', 'bidang_keahlian.id_bidang_keahlian = jurusan.id_bidang_keahlian')->get()->result();
        return $query;
        
    }
    function get1Jurusan($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countJurusan($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addJurusan($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  function updateJurusan($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }
    function deleteJurusan($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
