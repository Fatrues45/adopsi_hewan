<?php
class Hewan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('hewan')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('hewan', ['id_hewan' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('hewan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_hewan', $id);
        return $this->db->update('hewan', $data);
    }

    public function delete($id) {
        $this->db->where('id_hewan', $id);
        return $this->db->delete('hewan');
    }

    public function count_by_status($status) {
        return $this->db->where('status_adopsi', $status)->count_all_results('hewan');
    }

    public function jumlah_by_status($status)
    {
        return $this->db->where('status_adopsi', $status)->count_all_results('hewan');
    }

    public function get_tersedia() {
        return $this->db->get_where('hewan', ['status_adopsi' => 'tersedia'])->result();
    }

    public function get_by_jenis($jenis) {
        $this->db->where('LOWER(jenis)', strtolower($jenis));
        $this->db->where('status_adopsi', 'tersedia');
        return $this->db->get('hewan')->result();
    }

        public function get_satu_kucing_tersedia() {
        return $this->db->get_where('hewan', ['jenis' => 'Kucing', 'status_adopsi' => 'tersedia'], 1)->row();
    }

    public function get_satu_anjing_tersedia() {
        return $this->db->get_where('hewan', ['jenis' => 'Anjing', 'status_adopsi' => 'tersedia'], 1)->row();
    }

    public function count_tersedia_by_jenis($jenis) {
        return $this->db->where([
            'status_adopsi' => 'tersedia',
            'jenis' => $jenis
        ])->count_all_results('hewan');
    }


    public function count_diadopsi() {
        return $this->db->where('status_adopsi', 'diadopsi')->count_all_results('hewan');
    }


}