<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_rombel extends CI_Model
{

  function getJoinRombel ()
  {
    $this->db->select('*');
    $this->db->from ('kelas_rombel');
    $this->db->join('kelas', ' kelas_rombel.id_kelas= kelas.id_kelas');
    $this->db->join('jurusan', 'jurusan.id_jurusan = kelas_rombel.id_jurusan');

    $query =$this->db->get();
    return $query->result();
  }
  function getKelas()
  {
    return $this->db->get('kelas')->result();
  }
  function getJurusan()
  {
    return $this->db->get('jurusan')->result();
  }
  function input_data($data, $table){

    $this->db->insert($table, $data);
  }
  function edit_data($where)
  {
    return $this->db->get_where('kelas_rombel', $where)->result();
  }
  function updateRombel($where, $data)
  {
      $this->db->where($where);
      if ($this->db->update('kelas_rombel', $data) == TRUE) {
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
