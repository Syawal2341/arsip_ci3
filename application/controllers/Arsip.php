<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Arsip_model');
    $this->load->library('session');
  }

    public function index() {
        $data['arsip'] = $this->Arsip_model->get_all();
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');
        $data['kode_arsip'] = $this->Arsip_model->generate_kode(); // ini penting
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('arsip/index', $data);
        $this->load->view('template/footer');
    }


  public function tambah() {
    $this->load->view('arsip/tambah');
  }

  public function simpan() {
    // Buat kode arsip otomatis
    $prefix = 'DA' . date('my'); // contoh: DA0725
    $this->db->like('kode_arsip', $prefix, 'after');
    $this->db->order_by('kode_arsip', 'DESC');
    $last = $this->db->get('arsip')->row();

    if ($last) {
        $urut = (int) substr($last->kode_arsip, -3) + 1;
    } else {
        $urut = 1;
    }

    $kode_arsip = $prefix . str_pad($urut, 3, '0', STR_PAD_LEFT); // ex: DA0725001

    // Handle file upload
    $file_upload = '';
    if ($_FILES['file_upload']['name']) {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 2048; // 2MB
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_upload')) {
        $file_upload = $this->upload->data('file_name');
        } else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect('arsip');
        }
    }

    // Simpan data
    $data = [
        'kode_arsip' => $kode_arsip,
        'nama_file' => $this->input->post('nama_file'),
        'keterangan' => $this->input->post('keterangan'),
        'tanggal_upload' => date('Y-m-d'),
        'file_upload' => $file_upload
        ];


    $this->Arsip_model->insert($data);
    $this->session->set_flashdata('success', 'Data berhasil disimpan');
    redirect('arsip');
    }

    public function hapus($id) {
        $this->Arsip_model->delete($id);
        redirect('arsip');
    }

    public function update($id) {
        $arsip = $this->db->get_where('arsip', ['id' => $id])->row();

        $file_upload = $arsip->file_upload;
        if ($_FILES['file_upload']['name']) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_upload')) {
            // hapus file lama
            if ($arsip->file_upload && file_exists('./uploads/'.$arsip->file_upload)) {
                unlink('./uploads/'.$arsip->file_upload);
            }
            $file_upload = $this->upload->data('file_name');
            } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('arsip');
            }
        }

        $data = [
            'nama_file'      => $this->input->post('nama_file'),
            'keterangan'     => $this->input->post('keterangan'),
            'file_upload'    => $file_upload
        ];

        $this->db->where('id', $id);
        $this->db->update('arsip', $data);

        $this->session->set_flashdata('success', 'Data berhasil diupdate');
        redirect('arsip');
        }

}
