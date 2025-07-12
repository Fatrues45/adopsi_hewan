<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_admin extends CI_Controller {

    public function index() {
    $this->load->model('Donasi_model');

    $tanggal = $this->input->get('tanggal');
    $bulan   = $this->input->get('bulan');
    $tahun   = $this->input->get('tahun');

    // Jika tidak ada filter, default ke bulan & tahun sekarang
    if ($tanggal === null && $bulan === null && $tahun === null) {
        $tanggal = null; // Atau date('j') jika ingin hari ini
        $bulan = date('n');
        $tahun = date('Y');
    }

    $data['donasi'] = $this->Donasi_model->get_all_with_adopter();
    $data['filter'] = [
        'tanggal' => $tanggal,
        'bulan' => $bulan,
        'tahun' => $tahun
    ];

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/topbar');
    $this->load->view('admin/donasi_list', $data);
    $this->load->view('admin/footer');
}

    public function semua() {
    $this->load->model('Donasi_model');

    $data['donasi'] = $this->Donasi_model->get_all_with_adopter(); // pastikan method ini ada
    $data['filter'] = [
        'tanggal' => '',
        'bulan' => '',
        'tahun' => ''
    ];

    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/topbar');
    $this->load->view('admin/donasi_list', $data);
    $this->load->view('admin/footer');
}

}
