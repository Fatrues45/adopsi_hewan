<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adopter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adopter_model');
        $this->load->model('Donasi_model');
        $this->load->helper('url');
        if (session_status() == PHP_SESSION_NONE) session_start();
    }

    public function index() {
        redirect('adopter/dashboard');
    }

    public function login() {
        $this->load->view('adopter/login');
    }

    public function proses_login() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $adopter = $this->Adopter_model->get_by_email($email);
        if ($adopter && $adopter->password === $password) {
            $_SESSION['id_adopter'] = $adopter->id_adopter;
            $_SESSION['nama_adopter'] = $adopter->nama;
            $_SESSION['is_adopter_logged_in'] = true;
            redirect('adopter/dashboard');
        }

        $_SESSION['login_error'] = "Email atau password salah";
        redirect('adopter/login');
    }

    public function register() {
        $this->load->view('adopter/register');
    }

    public function proses_register() {
        $data = [
            'id_adopter' => 'ADP' . rand(100, 999),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'foto' => 'default_adopter.jpg'
        ];

        // Cek email sudah dipakai?
        if ($this->Adopter_model->get_by_email($data['email'])) {
            $_SESSION['register_error'] = "Email sudah digunakan";
            redirect('adopter/register');
        }

        $this->Adopter_model->insert($data);
        $_SESSION['register_success'] = "Pendaftaran berhasil. Silakan login.";
        redirect('adopter/login');
    }

    public function dashboard() {
        $this->load->model('Hewan_model');
        $this->load->model('Donasi_model');
        // Tidak perlu login
        $data['dokumentasi_donasi'] = $this->Donasi_model->get_all();
        $data['kontak'] = $this->Adopter_model->get_kontak(); // optional jika ada data kontak
        $data['kucing'] = $this->Hewan_model->get_satu_kucing_tersedia();
        $data['anjing'] = $this->Hewan_model->get_satu_anjing_tersedia();
        $data['jumlah_kucing'] = $this->Hewan_model->count_tersedia_by_jenis('Kucing');
        $data['jumlah_anjing'] = $this->Hewan_model->count_tersedia_by_jenis('Anjing');
        $data['jumlah_diadopsi'] = $this->Hewan_model->count_diadopsi();
        $data['donasi_masuk'] = $this->Donasi_model->get_all();
        $data['total_donasi'] = $this->Donasi_model->get_total_donasi();

        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/dashboard', $data);
        $this->load->view('templates/adopter_footer');
    }

    public function profil() {
        if (!isset($_SESSION['id_adopter'])) redirect('adopter/login');
        $data['adopter'] = $this->Adopter_model->get_by_id($_SESSION['id_adopter']);

        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/profil', $data);
        $this->load->view('templates/adopter_footer');
    }

    public function update_profil() {
        $this->load->model('Adopter_model');
        $id = $_SESSION['id_adopter'];
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        ];

        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->Adopter_model->update($id, $data);
        $_SESSION['nama_adopter'] = $data['nama'];
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        
        redirect('adopter/dashboard');
    }

    public function hewan($jenis = null) {
        if (!isset($_SESSION['is_adopter_logged_in'])) redirect('adopter/login');

        $this->load->model('Hewan_model');
        $data['hewan'] = $this->Hewan_model->get_by_jenis(strtolower($jenis));
        $data['jenis'] = ucfirst($jenis);
        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/daftar_hewan', $data);
        $this->load->view('templates/adopter_footer');
    }

    public function detail_hewan($id_hewan) {
        if (!isset($_SESSION['is_adopter_logged_in'])) redirect('adopter/login');

        $this->load->model('Hewan_model');
        $data['hewan'] = $this->Hewan_model->get_by_id($id_hewan);
        if (!$data['hewan']) show_404();

        $data['from'] = $this->input->get('from'); // ambil parameter ?from=kucing/anjing

        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/detail_hewan', $data);
        $this->load->view('templates/adopter_footer');
    }

    public function form_pengajuan($id_hewan) {
        if (!isset($_SESSION['is_adopter_logged_in'])) redirect('adopter/login');

        $this->load->model('Hewan_model');
        $this->load->model('Adopter_model');

        $data['hewan'] = $this->Hewan_model->get_by_id($id_hewan);
        $data['adopter'] = $this->Adopter_model->get_by_id($_SESSION['id_adopter']);
        if (!$data['hewan']) show_404();

        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/form_pengajuan_hewan', $data);
        $this->load->view('templates/adopter_footer');
    }


    public function simpan_pengajuan_hewan() {
        if (!isset($_SESSION['is_adopter_logged_in'])) redirect('adopter/login');

        $id_adopter = $_SESSION['id_adopter'];
        $id_hewan = $this->input->post('id_hewan');

        // Cek apakah sudah pernah mengajukan hewan ini dan statusnya belum diproses atau disetujui
        $this->db->where('id_adopter', $id_adopter);
        $this->db->where('id_hewan', $id_hewan);
        $this->db->where_in('status_pengajuan', ['diproses', 'disetujui']);
        $cek = $this->db->get('adopsi')->row();

        if ($cek) {
            // Sudah pernah mengajukan dan belum ditolak, tidak boleh ajukan ulang
            $this->session->set_flashdata('error', 'Anda sudah mengajukan hewan ini, tunggu prosesnya.');
            redirect('adopter/hewan'); // atau halaman lain
        }
        // Lanjut simpan jika valid
        $data = [
        'id_adopsi' => 'ADP' . rand(10000, 99999),
        'id_adopter' => $_SESSION['id_adopter'],
        'id_hewan' => $id_hewan,
        'tanggal_pengajuan' => date('Y-m-d'),
        'status_pengajuan' => 'diproses',
        'alasan' => $this->input->post('alasan'),
        'nama_pengaju' => $this->input->post('nama'),
        'usia' => $this->input->post('usia'),
        'telepon' => $this->input->post('telepon'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'alamat' => $this->input->post('alamat'),
        'penghasilan' => $this->input->post('penghasilan'),
    ];


        $this->db->insert('adopsi', $data);

        // Tambahkan notifikasi ke session
        $this->session->set_flashdata('pengajuan_sukses', 'Pengajuan Anda berhasil dikirim!');

        // Redirect ke dashboard adopter
        redirect('adopter/dashboard');
    }


        public function riwayat_pengajuan() {
        if (!isset($_SESSION['is_adopter_logged_in'])) redirect('adopter/login');

        $this->load->model('Adopsi_model');
        $id_adopter = $_SESSION['id_adopter'];
        $data['riwayat'] = $this->Adopsi_model->get_by_adopter($id_adopter);

        $this->load->view('templates/adopter_header');
        $this->load->view('adopter/riwayat_pengajuan', $data);
        $this->load->view('templates/adopter_footer');
    }


    public function logout() {
        session_start(); // jika belum dimulai
        session_destroy();
        redirect('adopter/login');
    }
}