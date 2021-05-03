<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->data();
    }

    public function data()
    {
        $data['barang'] = $this->barang_m->data();
        $this->load->view('aplikasi/barang/data', $data);
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

    public function validasi()
    {
        $this->form_validation->set_rules('nama', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual Supplier', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli Supplier', 'required');
        $this->form_validation->set_rules('stok', 'Stok Supplier', 'required');
    }

    public function insert()
    {
        $this->validasi();
        $this->form_validation->set_rules('kode_sup', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[barang.kode]');


        if ($this->form_validation->run()) {
            $this->barang_m->insert();
            $this->pesan('Tambah Data Berhasil !', 'Kamu berhasil menambahkan data baru', 'success');
        } else {
            $this->pesan('Tambah Data Gagal !', 'Cek kembali data yang kamu masukan', 'warning');
        }

        $this->index();
    }

    public function update()
    {
        $this->validasi();
        $this->form_validation->set_rules('kode', 'Kode', 'required');

        if ($this->form_validation->run()) {
            $this->barang_m->update();
            $this->pesan('Update Data Berhasil !', 'Kamu berhasil update data baru ', 'success');
        } else {
            $this->pesan('Update Data Gagal !', 'Cek kembali data yang kamu masukan', 'warning');
        }

        $this->index();
    }

    public function delete($kode)
    {
        $this->barang_m->delete($kode);
        redirect(site_url('aplikasi/barang/'));
    }
}
    
    /* End of file Barang.php */
