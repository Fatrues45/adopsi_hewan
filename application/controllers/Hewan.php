<?php
class Hewan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Jika bukan admin, wajib login sebagai adopter
        if (!isset($_SESSION['is_admin_logged_in'])) {
            if (!isset($_SESSION['is_adopter_logged_in'])) {
                // Simpan URL untuk redirect
                $this->session->set_userdata('redirect_after_login', current_url());
                redirect('adopter/login');
            }
        }

        $this->load->model('Hewan_model');
        $this->load->helper(['form', 'url']);
    }


    public function index() {
        $data['hewan'] = $this->Hewan_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/hewan_list', $data);
        $this->load->view('admin/footer');
    }

    public function tambah() {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/hewan_form');
        $this->load->view('admin/footer');
    }

    public function simpan() {
        $config['upload_path']   = './assets/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        $foto = '';
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $data = $this->upload->data();
                $foto = $data['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }
        $jenis = $this->input->post('jenis');
        $id_hewan_baru = $this->generate_id_hewan($jenis);

        $this->db->insert('hewan', [
            'id_hewan'          => $id_hewan_baru,
            'nama'              => $this->input->post('nama'),
            'jenis'             => $this->input->post('jenis'),
            'ras'               => $this->input->post('ras'),
            'gender'            => $this->input->post('gender'),
            'umur'              => $this->input->post('umur'),
            'status_adopsi'     => 'tersedia',
            'deskripsi'         => $this->input->post('deskripsi'),
            'foto'              => $foto
        ]);

        redirect('hewan');
    }

    private function generate_id_hewan($jenis) {
        $prefix = '';
        if (strtolower($jenis) == 'kucing') {
            $prefix = 'KC';
        } elseif (strtolower($jenis) == 'anjing') {
            $prefix = 'AJG';
        } else {
            $prefix = 'LN'; // Lainnya
        }

        $this->db->select('RIGHT(id_hewan,3) as kode', FALSE);
        $this->db->like('id_hewan', $prefix, 'after');
        $this->db->order_by('id_hewan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('hewan');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kode_baru = str_pad($kode, 3, "0", STR_PAD_LEFT);
        return $prefix . $kode_baru;
    }


    public function hapus($id) {
        // Hapus semua pengajuan adopsi yang terkait dengan hewan
        $this->db->where('id_hewan', $id);
        $this->db->delete('adopsi');

        // Hapus data hewan
        $this->Hewan_model->delete($id);

        // Redirect kembali ke daftar hewan
        redirect('hewan');
    }


    public function edit($id) {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $data['hewan'] = $this->Hewan_model->get_by_id($id);
        $this->load->view('admin/hewan_form', $data);
        $this->load->view('admin/footer');
    }

    public function update($id) {
        // Ambil data hewan lama
        $old = $this->Hewan_model->get_by_id($id);

        $data = [
            'nama'      => $this->input->post('nama'),
            'jenis'     => $this->input->post('jenis'),
            'ras'       => $this->input->post('ras'),
            'gender'    => $this->input->post('gender'),
            'umur'      => $this->input->post('umur'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status_adopsi' => $old->status_adopsi // ✅ Ambil status lama
        ];

        // Foto baru diupload
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // hapus foto lama jika ada
                if ($old && $old->foto && file_exists('./assets/upload/'.$old->foto)) {
                    unlink('./assets/upload/'.$old->foto);
                }

                $upload_data = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $this->Hewan_model->update($id, $data);
        redirect('hewan');
    }


    public function dashboard() {
        $this->load->model('Hewan_model');
        $data['status_adopsi'] = $this->Hewan_model->count_by_status('tersedia');
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    public function pengajuan_adopsi() {
        $this->load->model('Adopsi_model');
        $data['pengajuan'] = $this->Adopsi_model->get_all_with_detail(); // join ke hewan & adopter

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/pengajuan_adopsi', $data);
        $this->load->view('admin/footer');
    }


    public function cetak_pdf() {
        $this->load->model('Hewan_model');
        $data['hewan'] = $this->Hewan_model->get_all();

        // Load library Dompdf
        $this->load->library('pdf');

        // Render HTML
        $html = $this->load->view('admin/laporan_hewan_pdf', $data, TRUE);

        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("laporan_data_hewan.pdf", array("Attachment" => false));
    }


}
