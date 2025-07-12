<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = 'Data Kontak & Lokasi';
        $data['kontak'] = $this->Kontak_model->get();

        // Cek jika belum ada data, buat default
        if (!$data['kontak']) {
            $this->Kontak_model->insert_default();
            $data['kontak'] = $this->Kontak_model->get();
        }

        // Urutan pemanggilan view
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/kontak_view', $data);
        $this->load->view('admin/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Kontak & Lokasi';
        $data['kontak'] = $this->Kontak_model->get();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/kontak_form', $data);
        $this->load->view('admin/footer');
    }


    public function update()
    {
        $this->Kontak_model->update($this->input->post());
        $this->session->set_flashdata('success', 'Data kontak berhasil diperbarui.');
        redirect('kontak');
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

}