<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_tahun');

  }

  public function index(){

    $data['tahun']= $this->M_tahun->getTahun();
    $data['title']= "Data Tahun Akademik";
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/tahun/v_tahun',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
      'tahun_akademik'=>$this->input->post("tahun_akademik"),
      'semester'=>$this->input->post("semester"),
      'status'=>$this->input->post("status")
    ];
    $this->M_tahun->input_data($data, 'tahun_akademik');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('tahun');
  }
  function edit(){
    $data['id'] = $this->input->post('id_tahun_akademik');
    $where = array(
      'id_tahun_akademik' => $this->input->post('id_tahun_akademik')
    );
    $data['tahun'] = $this->M_tahun->edit_data($where);
    $this->load->view('admin/tahun/edit_tahun',$data);

  }

  public function update()  {

      $where = array('id_tahun_akademik' => $this->input->post('id_tahun_akademik'));
      $data = array(
        'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
        'tahun_akademik'=>$this->input->post("tahun_akademik"),
        'semester'=>$this->input->post("semester"),
        'status'=>$this->input->post("status")
      );
      $this->M_tahun->updateTahun($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('tahun');
  }





}
