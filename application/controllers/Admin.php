<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function dashboard() {
        $this->load->model('Hewan_model');

        $data['tersedia'] = $this->Hewan_model->jumlah_by_status('tersedia');
        $data['diadopsi'] = $this->Hewan_model->jumlah_by_status('diadopsi');

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/index', $data); // ✅ kirim data ke view
        $this->load->view('admin/footer');
    }

    public function __construct() {
        parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['is_admin_logged_in'])) {
            redirect('autentifikasi/login');
        }
    }

    public function profil() {
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->load->model('Admin_model');
        $id_admin = $_SESSION['id_admin'];

        $data['admin'] = $this->Admin_model->get_by_id($id_admin);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/profil', $data);  // ini file view profil admin
        $this->load->view('admin/footer');
    }
    public function update_profil() {
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $id = $_SESSION['id_admin'];
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $password = $this->input->post('password');
        
        $data = [
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon
        ];

        if (!empty($password)) {
            $data['password'] = md5($password); // atau pakai password_hash()
        }

        $this->load->model('Admin_model');
        $this->Admin_model->update($id, $data);

        // Update session juga
        $_SESSION['nama_admin'] = $nama;
        $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');

        redirect('admin/profil');
    }

    public function pengajuan_adopsi() {
        $this->load->model('Adopsi_model');
        $data['pengajuan'] = $this->Adopsi_model->get_all_with_detail();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pengajuan_adopsi', $data);
        $this->load->view('admin/footer');
    }

    public function setujui($id_adopsi) {
        $this->load->model('Adopsi_model');
        $this->load->model('Hewan_model');

        // Ambil data pengajuan
        $pengajuan = $this->db->get_where('adopsi', ['id_adopsi' => $id_adopsi])->row();

        if ($pengajuan) {
            // Update status pengajuan
            $this->Adopsi_model->update_status($id_adopsi, 'disetujui');

            // Update status hewan ke 'diadopsi'
            $this->Hewan_model->update($pengajuan->id_hewan, ['status_adopsi' => 'diadopsi']);
        }

        redirect('admin/pengajuan_adopsi');
    }

    public function tolak($id) {
        $this->load->model('Adopsi_model');
        $this->Adopsi_model->update_status($id, 'ditolak');
        redirect('admin/pengajuan_adopsi');
    }

    public function hapus_pengajuan($id_adopsi) {
        $this->db->delete('adopsi', ['id_adopsi' => $id_adopsi]);
        $this->session->set_flashdata('success', 'Data pengajuan berhasil dihapus');
        redirect('admin/pengajuan_adopsi');
    }

    public function cetak_pdf_pengajuan() {
        $this->load->model('Adopsi_model');
        $data['pengajuan'] = $this->Adopsi_model->get_all_with_detail();

        $this->load->library('pdf');
        $html = $this->load->view('admin/laporan_pengajuan_pdf', $data, true);

        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        $this->pdf->stream("laporan_pengajuan_adopsi.pdf", array("Attachment" => false));
    }

    public function cetak_pdf_donasi() {
        $this->load->model('Donasi_model');

        // Gunakan relasi lengkap agar nama muncul
        $data['donasi'] = $this->Donasi_model->get_all_with_adopter(); 

        $html = $this->load->view('admin/laporan_donasi_pdf', $data, true);

        $this->load->library('pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->render();
        $this->pdf->stream("laporan_donasi_masuk.pdf", array("Attachment" => false));
    }

}