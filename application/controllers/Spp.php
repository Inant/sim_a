<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_spp');

  }

  public function index(){
    $data['kelas']= $this->M_spp->getkelas();
    $data['title']= "Data SPP";
    $data['spp']= $this->M_spp->getJoinSpp();
    $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/spp/v_spp',$data);
    $this->load->view('common/footer');
  }
  function add(){
    $data=[
      'id_spp'=>$this->input->post("id_spp"),
      'nama_spp'=>$this->input->post("nama_spp"),
      'nominal'=>$this->input->post("nominal"),
      'id_kelas'=>$this->input->post("id_kelas")

    ];
    $this->M_spp->input_data($data, 'spp');
    $this->session->set_flashdata("input_success", "<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data berhasil ditambahkan.<br></div>");
    redirect('spp');
  }
  function edit(){
    $data['id'] = $this->input->post('id_spp');
    $where = array(
      'id_spp' => $this->input->post('id_spp')
    );
    $data['spp'] = $this->M_spp->edit_data($where);
    $data['kelas'] = $this->M_spp->getKelas();
    $this->load->view('admin/spp/edit_spp',$data);

  }

  public function update()  {

      $where = array('id_spp' => $this->input->post('id_spp'));
      $data = array(
        'id_spp'=>$this->input->post("id_spp"),
        'nama_spp'=>$this->input->post("nama_spp"),
        'nominal'=>$this->input->post("nominal"),
        'id_kelas'=>$this->input->post("id_kelas")
      );
      $this->M_spp->updateSpp($where, $data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    redirect('spp');
  }

  function hapus($id){
    $where = array('id_spp' => $id);
    $this->M_spp->hapus_data($where,'spp');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('spp');
  }



}
