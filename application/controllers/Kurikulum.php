<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_kurikulum');

  }

  public function index(){

    $data['kurikulum']= $this->M_kurikulum->getKurikulum();
    $data['title']= "Data Kurikulum ";
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/kurikulum/v_kurikulum',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_kurikulum'=>$this->input->post("id_kurikulum"),
      'nama_kurikulum'=>$this->input->post("nama_kurikulum"),
      'status'=>$this->input->post("status")
    ];
    $this->M_kurikulum->input_data($data, 'kurikulum');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('kurikulum');
  }
  function edit(){
    $data['id'] = $this->input->post('id_kurikulum');
    $where = array(
      'id_kurikulum' => $this->input->post('id_kurikulum')
    );
    $data['kurikulum'] = $this->M_kurikulum->edit_data($where);
    $this->load->view('admin/kurikulum/edit_kurikulum',$data);

  }

  public function update()  {

      $where = array('id_kurikulum' => $this->input->post('id_kurikulum'));
      $data = array(
        'id_kurikulum'=>$this->input->post("id_kurikulum"),
        'nama_kurikulum'=>$this->input->post("nama_kurikulum"),
        'status'=>$this->input->post("status")
      );
      $this->M_kurikulum->updateKurikulum($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('kurikulum');
  }
  function hapus($id){
    $where = array('id_kurikulum' => $id);
    $this->M_kurikulum->hapus_data($where,'kurikulum');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('kurikulum');
  }

}
