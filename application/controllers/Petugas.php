<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Petugas_model');
        $this->load->library('session');
    }

    public function index() {
    $data['petugas'] = $this->Petugas_model->get_all();
    $data['username'] = $this->session->userdata('username');
    $data['role'] = $this->session->userdata('role');
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('petugas/index', $data);
    $this->load->view('template/footer');
}


    public function simpan() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama'     => $this->input->post('nama')
        ];

        $this->Petugas_model->insert($data);
        $this->session->set_flashdata('success', 'Data petugas berhasil disimpan');
        redirect('petugas');
    }

    public function hapus($id) {
        $this->Petugas_model->delete($id);
        redirect('petugas');
    }

    public function update($id) {
        $petugas = $this->Petugas_model->get_by_id($id);

        $data = [
            'username' => $this->input->post('username'),
            'nama'     => $this->input->post('nama')
        ];
        $password = $this->input->post('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->Petugas_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data petugas berhasil diupdate');
        redirect('petugas');
    }
}
