<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_kelas extends CI_Model
{
    private $_table = 'kelas';
    function getKelas()
    {
        return $this->db->get($this->_table)->result();
    }
    function get1Kelas($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countKelas($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addKelas($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function updateKelas($where, $data)
    {
        $this->db->where($where);
        if ($this->db->update($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function deleteKelas($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
