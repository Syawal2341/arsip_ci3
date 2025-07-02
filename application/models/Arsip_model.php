<?php
class Arsip_model extends CI_Model {

    public function generate_kode() {
        $prefix = 'DA' . date('my'); // contoh: DA0725
        $this->db->like('kode_arsip', $prefix, 'after');
        $this->db->order_by('kode_arsip', 'DESC');
        $last = $this->db->get('arsip')->row();

        if ($last) {
            $urut = (int) substr($last->kode_arsip, -3) + 1;
        } else {
            $urut = 1;
        }

        return $prefix . str_pad($urut, 3, '0', STR_PAD_LEFT); // hasil akhir: DA0725001
    }
    public function get_all() {
        return $this->db->get('arsip')->result();
    }

    public function insert($data) {
        return $this->db->insert('arsip', $data);
    }

    public function delete($id) {
        return $this->db->delete('arsip', ['id' => $id]);
    }

}
