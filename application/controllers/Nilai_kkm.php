<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_kkm extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_nilai_kkm");
    $this->load->model('M_kelas');
    $this->load->model('M_mapel');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data["title"] = "Data Nilai KKM";
    $data["kelas"] = $this->M_kelas->getKelas();
    $data["mapel"] = $this->M_mapel->getMapel();
    $data["nilai_kkm"] = $this->M_nilai_kkm->getNilaiKkm();
       $this->load->view('common/head');
    $this->load->view('common/topbar');
    $this->load->view('common/sidebar');
    $this->load->view('common/breadcrumb',$data);
    $this->load->view('admin/nilai_kkm/v_nilai_kkm',$data);
    $this->load->view('common/footer');
  }

  public function add()
  {

    $rules = array(
      array(
        'field'=>'nilai_kkm',
        'label'=>'Nilai KKM',
        'rules'=>'required'
      ),
      array(
        'field'=>'id_mapel',
        'label' => 'Mata Pelajaran',
        'rules' => 'required'
      ),
      array(
        'field'=>'id_kelas',
        'label' => 'Kelas',
        'rules' => 'required'
      )

    );

    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==TRUE){
      // Input data ke data nilai_kkm
      $data =array(
        'id_mapel' => $this->input->post('id_mapel'),
        'id_kelas' => $this->input->post('id_kelas'),
        'nilai_kkm' => $this->input->post('nilai_kkm'),
      );
      $this->M_nilai_kkm->addNilaiKkm($data);

    }else{
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('nilai_kkm');


  }
  function edit(){
    $id_kkm = $this->input->post('id');
    $data['nilai_kkm_edit'] = $this->M_nilai_kkm->get1NilaiKkm(array('id_kkm' => $id_kkm));
    $data["kelas"] = $this->M_kelas->getKelas();
    $data["mapel"] = $this->M_mapel->getMapel();
    $this->load->view('admin/nilai_kkm/edit_nilai_kkm',$data);
  }

  function update(){
    //Melakukan Validasi Form Untuk Mennilai_kkmin data terisi semua
    $rules = array(
      array(
        'field'=>'nilai_kkm',
        'label'=>'Nilai KKM',
        'rules'=>'required'
      ),
      array(
        'field'=>'id_mapel',
        'label' => 'Mata Pelajaran',
        'rules' => 'required'
      ),
      array(
        'field'=>'id_kelas',
        'label' => 'Kelas',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run() == TRUE){ //Jika validasi Form Berhasil
      //Input Ke Tabel NilaiKkm
      $where = array('id_kkm' => $this->input->post('id_kkm'));
      $data = array(
        'id_mapel' => $this->input->post('id_mapel'),
        'id_kelas' => $this->input->post('id_kelas'),
        'nilai_kkm' => $this->input->post('nilai_kkm'),
      );
      $this->M_nilai_kkm->updateNilaiKkm($where,$data);
      $this->session->set_flashdata("update_success","<div class='alert alert-success'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Diubah!!</div>");

    }else{ //Jika validasi Form Gagal
      $gagal = validation_errors();
      $this->session->set_flashdata("update_failed","<div class='alert alert-danger'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Gagal Diubah!!<br>".$gagal."</div>");
    }
    redirect('nilai_kkm');
  }

  function hapus($id){
    $where = array('id_kkm' => $id);
    $this->M_nilai_kkm->deleteNilaiKkm($where,'mapel_kkm_perkelas');
    $this->session->set_flashdata("delete_success","<div class='alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Data Berhasil Dihapus!!</div>");
    redirect('nilai_kkm');
  }
}


?>
