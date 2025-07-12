<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    public function get()
    {
        return $this->db->get('kontak')->row(); // diasumsikan hanya 1 baris data
    }

    public function insert_default()
    {
        $data = [
            'id_kontak' => 'KNT001',
            'alamat' => '',
            'email' => 'temansejati@gmail.com',
            'telepon' => '',
            'deskripsi' => '',
        ];
        $this->db->insert('kontak', $data);
    }


    public function update($data)
    {
        $this->db->where('id_kontak', $data['id_kontak']);
        $this->db->update('kontak', [
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'deskripsi' => $data['deskripsi'],
        ]);
    }
}