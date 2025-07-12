<?php
class Admin_model extends CI_Model {

    public function get_by_email($email) {
        return $this->db->get_where('admin', ['email' => $email])->row();
    }

    public function get_by_id($id_admin) {
        return $this->db->get_where('admin', ['id_admin' => $id_admin])->row();
    }

    public function update($id_admin, $data) {
        return $this->db->where('id_admin', $id_admin)->update('admin', $data);
    }

    public function insert($data) {
        return $this->db->insert('admin', $data);
    }

    public function get_by_adopter($id_adopter) {
        $this->db->select('adopsi.*, hewan.nama as nama_hewan, hewan.jenis');
        $this->db->from('adopsi');
        $this->db->join('hewan', 'hewan.id_hewan = adopsi.id_hewan');
        $this->db->where('adopsi.id_adopter', $id_adopter);
        $this->db->order_by('tanggal_pengajuan', 'DESC');
        return $this->db->get()->result();
    }


}
