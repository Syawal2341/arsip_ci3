<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->library('session');
  }

  public function index() {
    $data['admin'] = $this->Admin_model->get_all();
    $data['username'] = $this->session->userdata('username');
    $data['role'] = $this->session->userdata('role');
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }

  public function tambah() {
    $this->load->view('admin/tambah');
  }

  public function simpan() {
    $data = [
      'username' => $this->input->post('username'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'nama'     => $this->input->post('nama')
    ];
    $this->Admin_model->insert($data);
    $this->session->set_flashdata('success', 'Admin berhasil ditambahkan');
    redirect('admin');
  }

  public function hapus($id) {
    $this->Admin_model->delete($id);
    redirect('admin');
  }

  public function update($id) {
    $data = [
      'username' => $this->input->post('username'),
      'nama'     => $this->input->post('nama')
    ];
    $this->Admin_model->update($id, $data);
    $this->session->set_flashdata('success', 'Admin berhasil diupdate');
    redirect('admin');
  }
}
