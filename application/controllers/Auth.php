<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->database();
  }

  public function index() {
    $data['error'] = $this->session->flashdata('error');
    $this->load->view('login', $data);
  }

  public function login() {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password')); // pakai MD5 sementara

    $user = $this->db->get_where('users', [
      'username' => $username,
      'password' => $password
    ])->row();

    if ($user) {
      $this->session->set_userdata([
        'username' => $user->username,
        'role'     => $user->role,
        'logged_in'=> TRUE
      ]);
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('error', 'Username atau password salah');
      redirect('auth');
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('auth');
  }
}
