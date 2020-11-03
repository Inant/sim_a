<?php
defined("BASEPATH") or die("No Direct Access Allowed");
class M_mapel extends CI_Model
{
    private $_table = 'mata_pelajaran';
    function getMapel()
    {
        return $this->db->get($this->_table)->result();
    }
    function get1Mapel($where)
    {
        return $this->db->get_where($this->_table, $where)->result();
    }
    function countMapel($where)
    {
        return $this->db->get_where($this->_table, $where)->num_rows();
    }
    function addMapel($data)
    {
        if ($this->db->insert($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function updateMapel($where, $data)
    {
        $this->db->where($where);
        if ($this->db->update($this->_table, $data) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function deleteMapel($where)
    {
        $this->db->where($where);
        if ($this->db->delete($this->_table) == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
