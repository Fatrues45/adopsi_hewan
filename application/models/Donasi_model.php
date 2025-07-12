<?php
class Donasi_model extends CI_Model {

    // === DONASI (UTAMA) ===
    public function simpan($data) {
        $this->db->insert('donasi', $data);
    }


    public function get_by_adopter($id_adopter) {
        return $this->db->where('id_adopter', $id_adopter)
                        ->order_by('tanggal', 'DESC')
                        ->get('donasi')
                        ->result();
    }

    public function get_all_with_adopter() {
        $this->db->select('d.*, a.nama as nama_adopter');
        $this->db->from('donasi d');
        $this->db->join('adopter a', 'a.id_adopter = d.id_adopter', 'left');
        return $this->db->get()->result();
    }

    public function get_filtered($tanggal = null, $bulan = null, $tahun = null) {
        $this->db->select('donasi.*, adopter.nama as nama_adopter');
        $this->db->from('donasi');
        $this->db->join('adopter', 'adopter.id_adopter = donasi.id_adopter', 'left');

        if ($tanggal) {
            $this->db->where('DAY(tanggal)', $tanggal);
        }

        if ($bulan) {
            $this->db->where('MONTH(tanggal)', $bulan);
        }

        if ($tahun) {
            $this->db->where('YEAR(tanggal)', $tahun);
        }

        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // === DOKUMENTASI DONASI ===
    public function get_all() {
        return $this->db->order_by('created_at', 'DESC')->get('dokumentasi_donasi')->result();
    }

    public function get($id_dokum) {
        return $this->db->get_where('dokumentasi_donasi', ['id_dokum' => $id_dokum])->row();
    }

    public function insert($data) {
        $this->db->insert('dokumentasi_donasi', $data);
        if ($this->db->affected_rows() == 0) {
            log_message('error', 'Insert dokumentasi gagal: ' . $this->db->last_query());
        }
    }

    public function update($id_dokum, $data) {
        $this->db->where('id_dokum', $id_dokum)->update('dokumentasi_donasi', $data);
        if ($this->db->affected_rows() == 0) {
            log_message('error', 'Update dokumentasi GAGAL: ' . $this->db->last_query());
        } else {
            log_message('debug', 'Update dokumentasi BERHASIL: ' . $this->db->last_query());
        }
    }

    public function delete($id_dokum) {
        $this->db->where('id_dokum', $id_dokum)->delete('dokumentasi_donasi');
    }
    public function get_total_donasi() {
        $this->db->select_sum('jumlah'); // pastikan kolomnya bernama `jumlah`
        $query = $this->db->get('donasi'); // ganti sesuai nama tabel donasi kamu
        return $query->row()->jumlah ?? 0;
    }

}
