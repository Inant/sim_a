<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_nilai_kkm extends CI_Model
{
    private $_table = 'mapel_kkm_perkelas';
    function getNilaiKkm()
    {

        $query = $this->db->select('mata_pelajaran.id_mapel, mata_pelajaran.nama_mapel, mapel_kkm_perkelas.nilai_kkm,mapel_kkm_perkelas.id_kkm,kelas.nama_kelas')
                ->from('mapel_kkm_perkelas')
                ->join('mata_pelajaran', 'mapel_kkm_perkelas.id_mapel = mata_pelajaran.id_mapel')
                ->join('kelas', 'mapel_kkm_perkelas.id_kelas = kelas.id_kelas')->get()->result();
        return $query;
        
    }
    function get1NilaiKkm($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countNilaiKkm($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addNilaiKkm($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  function updateNilaiKkm($where,$data){
      $this->db->where($where);
      $this->db->update($this->_table,$data);
  }
    function deleteNilaiKkm($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
