<?php
class Petugas_model extends CI_Model {

    public function get_all() {
        return $this->db->get('petugas')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('petugas', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('petugas', $data);
    }

    public function delete($id) {
        return $this->db->delete('petugas', ['id' => $id]);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('petugas', $data);
    }
}
