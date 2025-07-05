<?php
class Admin_model extends CI_Model {

  public function get_all() {
    return $this->db->get('admin')->result();
  }

  public function insert($data) {
    return $this->db->insert('admin', $data);
  }

  public function delete($id) {
    return $this->db->delete('admin', ['id' => $id]);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('admin', $data);
  }
}
