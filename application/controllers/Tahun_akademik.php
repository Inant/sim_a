<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('M_tahun_akademik');
  }
  public function index()
  {
    $data['title']="Data Tahun Akademik";
    $data['tahun_akademik']=$this->M_tahun_akademik->get_tahun_akademik();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/tahun_ajaran/v_tahun_akademik',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $rules =[

      ['field' => 'tahun_akademik',
      'label' => 'Nama Tahun Akademik',
      'rules' => 'required'],
      ['field' => 'semester',
      'label' => 'Semester',
      'rules' => 'required'],
      ['field' => 'status',
      'label' => 'status',
      'rules' => 'required'],
    ];
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run()==TRUE){
      $data=[
        'id_tahun_akademik'=>$this->input->post("id_tahun_akademik"),
        'tahun_akademik'=>$this->input->post("tahun_akademik"),
        'semester'=>$this->input->post("semester"),
        'status'=>$this->input->post("status")
      ];
      $this->M_tahun_akademik->add_tahun_akademik($data);
      $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");

    }else {
      $gagal = validation_errors();
      $this->session->set_flashdata("input_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Ditambahkan!!<br>".$gagal."</div>");
    }
    redirect('tahun_akademik');
  }

  function edit(){
    $data['id'] = $this->input->post('id_tahun_akademik');
    $where = array(
      'id_tahun_akademik' => $this->input->post('id_tahun_akademik')
    );
    $data['tahun_akademik'] = $this->M_rombel->edit_data($where);

    $this->load->view('admin/tahun_ajaran/edit_tahun_akademik',$data);

  }

}
