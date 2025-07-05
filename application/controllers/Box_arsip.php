<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Box extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Box_model');
    $this->load->library('session');
  }

  public function index() {
    $data['box'] = $this->Box_model->get_all();
    $data['username'] = $this->session->userdata('username');
    $data['role'] = $this->session->userdata('role');
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('box/index', $data);
    $this->load->view('template/footer');
  }

  public function simpan() {
    $data = [
      'kode_box_arsip' => $this->input->post('kode_box_arsip'),
      'nama_box_arsip' => $this->input->post('nama_box_arsip')
    ];
    $this->Box_model->insert($data);
    $this->session->set_flashdata('success', 'Box Arsip berhasil disimpan');
    redirect('box');
  }

  public function hapus($kode) {
    $this->Box_model->delete($kode);
    redirect('box');
  }
}
