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
        $search = $this->input->get('search', TRUE);
        $data['daftar_cucian'] = $this->Daftarcucian_model->getAll($search);
        $data['search'] = $search;
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

    public function edit($id) {
        $cucian = $this->Daftarcucian_model->getById($id);
        if (!$cucian) {
            $this->session->set_flashdata('swal', array(
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data cucian tidak ditemukan.'
            ));
            redirect('daftarcucian');
        }

        $data['cucian'] = $cucian;
        $data['paket_list'] = $this->Daftarcucian_model->get_all_paket();
        $this->load->view('daftarcucian/edit', $data);
    }

    public function update($id) {
        $cucian = $this->Daftarcucian_model->getById($id);
        if (!$cucian) {
            $this->session->set_flashdata('swal', array(
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data cucian tidak ditemukan.'
            ));
            redirect('daftarcucian');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('paket', 'Paket Laundry', 'required');
        $this->form_validation->set_rules('berat', 'Berat Cucian', 'required|regex_match[/^[0-9]+([.,][0-9]+)?$/]');

        if ($this->form_validation->run() == FALSE) {
            $data['cucian'] = $cucian;
            $data['paket_list'] = $this->Daftarcucian_model->get_all_paket();
            $this->load->view('daftarcucian/edit', $data);
        } else {
            $nama     = $this->input->post('nama', TRUE);
            $nomor_hp = $this->input->post('nomor_hp', TRUE);
            $alamat   = $this->input->post('alamat', TRUE);
            $id_paket = $this->input->post('paket', TRUE);
            $berat    = $this->input->post('berat', TRUE);

            // Update data pelanggan
            $data_pelanggan = array(
                'nama_pelanggan' => $nama,
                'nomor_wa'       => $nomor_hp,
                'alamat'         => $alamat
            );
            $this->Daftarcucian_model->updatePelanggan($cucian['id_pelanggan'], $data_pelanggan);

            // Hitung ulang total biaya
            $paket = $this->Daftarcucian_model->get_paket_by_id($id_paket);
            $harga_per_kg = isset($paket['harga_per_kg']) ? $paket['harga_per_kg'] : 0;
            $total_biaya = $berat * $harga_per_kg;

            // Update data cucian
            $data_cucian = array(
                'id_paket'      => $id_paket,
                'berat_laundry' => $berat,
                'total_biaya'   => $total_biaya
            );
            $this->Daftarcucian_model->updateCucian($id, $data_cucian);

            $this->session->set_flashdata('swal', array(
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data cucian berhasil diperbarui.'
            ));
            redirect('daftarcucian');
        }
    }
}
