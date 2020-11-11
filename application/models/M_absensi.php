<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_absensi extends CI_Model
{
    private $_table = 'absensi';
    function getAbsensi()
    {

        $query = $this->db->select('absensi.id_absensi, absensi.tanggal_absen,absensi.ket, kelas.nama_kelas, kelas_rombel.nama_kelasRombel,siswa.nisn, siswa.nama_siswa')
                ->from('absensi')
                ->join('kelas', 'kelas.id_kelas = absensi.id_kelas')
                ->join('kelas_rombel', 'kelas_rombel.id_kelasRombel = absensi.id_kelasRombel')
                ->join('siswa', 'siswa.nisn = absensi.nisn')->get()->result();
        return $query;
        
    }
    function get1Absensi($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countAbsensi($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addAbsensi($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  function updateAbsensi($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }
    function deleteAbsensi($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getKetByNisn($nisn, $tahun, $kelas, $rombel, $mapel)
    {
        $result = $this->db->query("SELECT ket FROM absensi WHERE nisn = '$nisn' AND id_kelas = '$kelas' AND id_kelasRombel = '$rombel' AND id_jadwalPelajaran = '$mapel' AND id_tahun_akademik = '$tahun'")->result();
        return $result;
    }

}
