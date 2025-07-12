<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
    public function index()
    {
        $this->load->view('admin/header.php');
        $this->load->view('admin/sidebar.php');
        $this->load->view('admin/topbar.php');
        $this->load->view('admin/index.php');
        $this->load->view('admin/footer.php');
    }
}