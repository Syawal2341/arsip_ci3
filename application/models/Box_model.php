<?php
class Box_model extends CI_Model {

  public function get_all() {
    return $this->db->get('box_arsip')->result();
  }

  public function insert($data) {
    return $this->db->insert('box_arsip', $data);
  }

  public function delete($kode) {
    return $this->db->delete('box_arsip', ['kode_box_arsip' => $kode]);
  }
}
