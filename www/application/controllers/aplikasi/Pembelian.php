<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pembelian_m');
    }


    public function index()
    {
        $this->data();
    }

    public function data()
    {
        $data['pembelian'] = $this->pembelian_m->get();
        $this->load->view('aplikasi/pembelian/data', $data);
    }

    public function validasi()
    {
        $this->form_validation->set_rules('kode_brg', 'kode_brg', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('harga_jual', 'harga jual', 'required');
        $this->form_validation->set_rules('harga_beli', 'harga beli', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
    }

    public function pesan($title, $pesan, $icon)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $pesan . '!",
            icon: "' . $icon . '",
            button: "Confirm",
        });
        </script>';
        $this->session->set_userdata('pesan', $data);
    }


    public function insert()
    {
        $this->validasi();

        if ($this->form_validation->run()) {
            $this->pembelian_m->insert();
            $this->pembelian_m->stokTambah();
            $this->pesan('Tambah Data Berhasil !', 'Kamu berhasil menambahkan data Pembelian Baru', 'success');
        } else {
            $this->pesan('Tambah Data Gagal !', 'Cek kembali data yang kamu masukan', 'warning');
        }

        $this->index();
    }
}
    
    /* End of file Pembelian.php */
