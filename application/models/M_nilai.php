<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_nilai extends CI_Model
{
    private $_table = 'nilai';
    function getNilai($nis, $rombel, $tahun_akademik)
    {

        $query = $this->db->query("SELECT k.nama_kelas, kr.nama_kelasRombel, s.nama_siswa, m.nama_mapel, kn.nama_kategoriNilai, n.nilai,n.ket, t.tahun_akademik, t.semester FROM nilai n JOIN kelas_rombel kr ON kr.id_kelasRombel = n.id_rombel JOIN kelas k ON k.id_kelas = kr.id_kelas JOIN mata_pelajaran m ON m.id_mapel = n.id_mapel JOIN kategori_nilai kn ON kn.id_kategoriNilai = n.id_kategoriNilai JOIN siswa s ON s.nis = n.nis JOIN tahun_akademik t ON t.id_tahun_akademik = n.id_tahunAkademik WHERE n.nis = '$nis' AND n.id_rombel = '$rombel' AND n.id_tahun_akademik = '$tahun_akademik' ")->result();
                
        return $query;
        
    }
    function get1Nilai($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countNilai($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addNilai($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  function updateNilai($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
  }
    function deleteNilai($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getKetByNis($nis, $tahun, $kelas, $rombel, $mapel)
    {
        $result = $this->db->query("SELECT ket FROM absensi WHERE nis = '$nis' AND id_kelas = '$kelas' AND id_kelasRombel = '$rombel' AND id_jadwalPelajaran = '$mapel' AND id_tahun_akademik = '$tahun'")->result();
        return $result;
    }

}
