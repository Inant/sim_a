<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_bidang_keahlian extends CI_Model
{
  private $_table='bidang_keahlian';
  public function getBidangKeahlian(){
    return $this->db->get("bidang_keahlian")->result();
  }

  function get1BidangKeahlian($where)
  {
    return $this->db->get_where($this->_table, $where)->result();
  }

  public function countBidangKeahlian($where){
    return $this->db->get_where($this->_tabel,$where)->num_rows();
  }
  function addBidangKeahlian($data)
  {
    if ($this->db->insert($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  function updateBidangKeahlian($where, $data)
  {
    $this->db->where($where);
    if ($this->db->update($this->_table, $data) == TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function deleteBidangKeahlian($where)
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
