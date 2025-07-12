<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Adopter_model');
        $this->load->helper('url');
    }

    public function login() {
        $this->load->view('autentifikasi/login');
    }

    public function proses_login() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

    // Cek admin saja
        $admin = $this->Admin_model->get_by_email($email);
        if ($admin && $admin->password === $password) {
        $_SESSION['is_admin_logged_in'] = true;
        $_SESSION['id_admin'] = $admin->id_admin;
        $_SESSION['nama_admin'] = $admin->nama;
        return redirect('admin/dashboard');
    }

    // Jika bukan admin → tolak
    $_SESSION['login_error'] = "Email atau Password SALAH!";
    redirect('autentifikasi/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('autentifikasi/login');
    }

    public function register_admin() {
        $this->load->view('autentifikasi/register');
    }

    public function proses_register_admin() {
        $data = [
            'id_admin' => 'ADM' . rand(100, 999),
            'nama'     => $this->input->post('nama'),
            'email'    => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'foto'     => 'default_admin.jpg',
            'telepon'  => $this->input->post('telepon')
        ];

        // Cek apakah email sudah ada
        $cek = $this->Admin_model->get_by_email($data['email']);
        if ($cek) {
            $this->session->set_flashdata('register_error', "Email sudah digunakan");
            redirect('autentifikasi/register_admin');
        }

        $this->Admin_model->insert($data);
        $this->session->set_flashdata('register_success', "Akun berhasil dibuat, silakan login");
        redirect('autentifikasi/login');
    }
}
