<?php
class Adopsi_model extends CI_Model {
    public function get_all_with_detail() {
        $this->db->select('adopsi.*, hewan.nama as nama_hewan, hewan.jenis');
        $this->db->from('adopsi');
        $this->db->join('hewan', 'hewan.id_hewan = adopsi.id_hewan');
        $this->db->order_by('tanggal_pengajuan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_adopter($id_adopter) {
        $this->db->select('adopsi.*, hewan.nama as nama_hewan, hewan.jenis');
        $this->db->from('adopsi');
        $this->db->join('hewan', 'hewan.id_hewan = adopsi.id_hewan');
        $this->db->where('adopsi.id_adopter', $id_adopter);
        $this->db->order_by('tanggal_pengajuan', 'DESC');
        return $this->db->get()->result();
}


    public function update_status($id_adopsi, $status) {
        return $this->db->update('adopsi', ['status_pengajuan' => $status], ['id_adopsi' => $id_adopsi]);
    }

}