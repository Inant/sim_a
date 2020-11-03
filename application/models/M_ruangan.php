<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_ruangan extends CI_Model
{
    private $_table = 'ruangan';
    function getRuangan()
    {
        return $this->db->get($this->_table)->result();
    }
    function get1Ruangan($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countRuangan($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addRuangan($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function updateRuangan($where, $data)
    {
        $this->db->where($where);
        if ($this->db->update($this->_table, $data) == TRUE) {
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
