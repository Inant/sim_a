<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_walikelas extends CI_Model
{

  function getJoinWalikelas ()
  {
    $this->db->select('*');
    $this->db->from ('wali_kelas');
    $this->db->join('guru', ' wali_kelas.nip= guru.nip');
    $this->db->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik = wali_kelas.id_tahun_akademik');
    $this->db->join('kelas_rombel', 'kelas_rombel.id_kelasRombel= wali_kelas.id_kelasRombel');

    $query =$this->db->get();
    return $query->result();
  }
  function getGuru()
  {
    return $this->db->get('guru')->result();
  }
  function getTahun()
  {
    return $this->db->get('tahun_akademik')->result();
  }
  function getRombel()
  {
    return $this->db->get('kelas_rombel')->result();
  }
  function input_data($data, $table){

    $this->db->insert($table, $data);
  }
  function edit_data($where)
  {
    return $this->db->get_where('wali_kelas', $where)->result();
  }
  function updateWalikelas($where, $data)
  {
      $this->db->where($where);
      if ($this->db->update('wali_kelas', $data) == TRUE) {
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
