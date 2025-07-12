<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Validasi apakah user sudah login sebagai adopter
        if (!$this->session->userdata('id_adopter')) {
            // Simpan URL sekarang untuk redirect setelah login
            $this->session->set_userdata('redirect_after_login', current_url());
            redirect('adopter/login');
        }
    }

    public function index() {
        $this->load->view('adopter/donasi_form');
    }

   public function kirim() {
        $this->load->model('Donasi_model');

        $config['upload_path']   = './assets/upload/bukti/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_transfer')) {
            $data['error_upload'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
            return $this->load->view('adopter/donasi_form', $data);
        }

        $upload_data = $this->upload->data();
        $bukti_file = $upload_data['file_name'];

        // Masukkan donasi terlebih dahulu tanpa id_donasi
        $data = [
            'id_adopter'        => $this->session->userdata('id_adopter'),
            'nama_donatur'      => $this->input->post('nama'),
            'jumlah'            => $this->input->post('nominal'),
            'tanggal'           => date('Y-m-d'),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'bukti_transfer'    => $bukti_file
        ];

        // Simpan pertama kali
        $this->Donasi_model->simpan($data);

        // Ambil ID terakhir
        $insert_id = $this->db->insert_id();

        // Generate id_donasi berbasis auto increment
        $id_donasi = 'DNS' . str_pad($insert_id, 5, '0', STR_PAD_LEFT);

        // Update data donasi dengan id_donasi yang sudah digenerate
        $this->db->where('id', $insert_id)->update('donasi', ['id_donasi' => $id_donasi]);

        // Flash message & redirect
        $this->session->set_flashdata('success', 'Donasi berhasil! Terima kasih atas kontribusi Anda.');
        redirect('adopter/dashboard');
    }


}
