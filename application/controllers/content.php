<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_');

  }
  public function index()
  {
    $data['title']="";
    $data['data']=$this->M_->get();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/');
    $this->load->view('common/footer');

  }
}
