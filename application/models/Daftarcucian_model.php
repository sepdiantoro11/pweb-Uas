<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarcucian_model extends CI_Model {

    public function getAll($search = '') {
        $this->db->select('
            daftar_cucian.*,
            pelanggan.nama_pelanggan,
            paket_laundry.nama_paket,
            kasir.nama_kasir
        ');
        $this->db->from('daftar_cucian');
        $this->db->join('pelanggan', 'daftar_cucian.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('paket_laundry', 'daftar_cucian.id_paket = paket_laundry.id_paket', 'left');
        $this->db->join('kasir', 'daftar_cucian.id_kasir = kasir.id_kasir', 'left');
        if ($search != '') {
            $this->db->like('pelanggan.nama_pelanggan', $search);
        }
        $this->db->order_by('daftar_cucian.tgl_masuk', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getById($id) {
        $this->db->select('
            daftar_cucian.*,
            pelanggan.nama_pelanggan,
            paket_laundry.nama_paket,
            kasir.nama_kasir
        ');
        $this->db->from('daftar_cucian');
        $this->db->join('pelanggan', 'daftar_cucian.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('paket_laundry', 'daftar_cucian.id_paket = paket_laundry.id_paket', 'left');
        $this->db->join('kasir', 'daftar_cucian.id_kasir = kasir.id_kasir', 'left');
        $this->db->where('daftar_cucian.id_cucian', $id);
        return $this->db->get()->row_array();
    }

    public function updateStatus($id, $status) {
        $this->db->where('id_cucian', $id);
        return $this->db->update('daftar_cucian', array('status_cucian' => $status));
    }

    public function get_all_paket() {
        return $this->db->get('paket_laundry')->result_array();
    }

    public function get_paket_by_id($id) {
        return $this->db->get_where('paket_laundry', array('id_paket' => $id))->row_array();
    }

    public function updateCucian($id, $data) {
        $this->db->where('id_cucian', $id);
        return $this->db->update('daftar_cucian', $data);
    }

    public function updatePelanggan($id_pelanggan, $data) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        return $this->db->update('pelanggan', $data);
    }

    public function moveToRiwayat($id) {
        $cucian = $this->getById($id);
        if (!$cucian) {
            return false;
        }

        $data_riwayat = array(
            'id_cucian'             => $cucian['id_cucian'],
            'nama_pelanggan_arsip'  => $cucian['nama_pelanggan'],
            'nama_paket_arsip'      => $cucian['nama_paket'],
            'total_biaya_final'     => $cucian['total_biaya'],
            'status_cucian'         => 'Selesai Dicuci',
            'tgl_diambil'           => date('Y-m-d H:i:s')
        );
        $this->db->insert('riwayat', $data_riwayat);

        $this->db->where('id_cucian', $id);
        $this->db->delete('daftar_cucian');

        return true;
    }
}
