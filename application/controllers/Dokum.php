<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokum extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Donasi_model');
    }

    public function index() {
        $data['foto_donasi'] = $this->Donasi_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/dokum', $data);
        $this->load->view('admin/footer');
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $config['upload_path'] = './assets/upload/donasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('dokum/tambah');
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'id_dokum' => uniqid('DKM'),
                    'judul_donasi' => $this->input->post('judul_donasi'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto_donasi' => 'assets/upload/donasi/' . $upload_data['file_name'],
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $this->Donasi_model->insert($data);
                $this->session->set_flashdata('success', 'Dokumentasi berhasil ditambahkan.');
                redirect('dokum');
            }
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/dokum_form');
            $this->load->view('admin/footer');
        }
    }

    public function edit($id_dokum) {
        $dokum = $this->Donasi_model->get($id_dokum);
        if (!$dokum) show_404();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $update_data = [];

            $update_data['judul_donasi'] = $this->input->post('judul_donasi');
            $update_data['deskripsi'] = $this->input->post('deskripsi');

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/upload/donasi/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $foto_path = 'assets/upload/donasi/' . $upload_data['file_name'];

                    // Hapus foto lama
                    if (file_exists(FCPATH . $dokum->foto_donasi)) {
                        unlink(FCPATH . $dokum->foto_donasi);
                    }

                    $update_data['foto_donasi'] = $foto_path;

                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dokum/edit/' . $id_dokum);
                }
            }

            if (!empty($update_data)) {
                $this->Donasi_model->update($id_dokum, $update_data);
            }

            $this->session->set_flashdata('success', 'Dokumentasi berhasil diperbarui.');
            redirect('dokum');
        } else {
            $data['foto_donasi'] = $dokum;
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/dokum_form', $data);
            $this->load->view('admin/footer');
        }
    }

    public function hapus($id_dokum) {
        $dokum = $this->Donasi_model->get($id_dokum);
        if ($dokum && file_exists(FCPATH . $dokum->foto_donasi)) {
            unlink(FCPATH . $dokum->foto_donasi);
        }

        $this->Donasi_model->delete($id_dokum);
        $this->session->set_flashdata('success', 'Dokumentasi berhasil dihapus.');
        redirect('dokum');
    }
}
