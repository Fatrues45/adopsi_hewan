<?php
class Adopter_model extends CI_Model {
    public function get_by_email($email) {
        return $this->db->get_where('adopter', ['email' => $email])->row();
    }

    public function insert($data) {
        return $this->db->insert('adopter', $data);
    }

    public function get_by_id($id_adopter) {
        return $this->db->get_where('adopter', ['id_adopter' => $id_adopter])->row();
    }   

    public function update($id_adopter, $data) {
        return $this->db->where('id_adopter', $id_adopter)->update('adopter', $data);
    }

    public function get_kontak() {
        return $this->db->get('kontak')->row();
    }
}
