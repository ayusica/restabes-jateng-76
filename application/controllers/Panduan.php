<?php
defined('BASEPATH') or $this->getResponse()->setBody('No direct script access allowed');

class Panduan extends CI_Controller
{

    /**************PANDUAN PENGGUNAAN WEB*********************/
    public function index()
    {
        if ($this->session->userdata('masuk') == FALSE) {
            redirect('login');
        } else {
            $data['judul'] = "Panduan Penggunaan Sistem";

            $this->load->view('templates/user/header_user', $data);
            $this->load->view('templates/user/sidebar');
            $this->load->view('templates/user/topbar');
            $this->load->view('panduan/index');
            $this->load->view('templates/user/footer');
        }
    }
}
