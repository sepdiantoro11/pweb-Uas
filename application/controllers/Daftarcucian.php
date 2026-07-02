<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarcucian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silakan login terlebih dahulu.</div>');
            redirect('auth');
        }
        $this->load->model('Daftarcucian_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['daftar_cucian'] = $this->Daftarcucian_model->getAll();
        $this->load->view('daftarcucian/index', $data);
    }

    public function ubahStatus($id) {
        $cucian = $this->Daftarcucian_model->getById($id);
        if (!$cucian) {
            $this->session->set_flashdata('swal', array(
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data cucian tidak ditemukan.'
            ));
            redirect('daftarcucian');
        }

        // Update status dulu ke 'Diambil' sebelum diarsip
        $this->Daftarcucian_model->updateStatus($id, 'Diambil');

        // Pindahkan ke riwayat
        $this->Daftarcucian_model->moveToRiwayat($id);

        $this->session->set_flashdata('swal', array(
            'icon'  => 'success',
            'title' => 'Berhasil!',
            'text'  => 'Cucian telah selesai dan dipindahkan ke riwayat.'
        ));

        redirect('daftarcucian');
    }
}
