<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_m');
        $this->load->library('form_validation');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'NoHp', 'required');
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


    public function index()
    {
        $this->data();
    }

    public function data()
    {
        $data['supplier'] = $this->supplier_m->get();
        $this->load->view('aplikasi/supplier/data', $data);
    }

    public function insert()
    {
        $this->validasi();
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[supplier.kode]');

        if ($this->form_validation->run()) {
            $this->supplier_m->insert();
            $this->pesan('Tambah Data Berhasil !', 'Kamu berhasil menambahkan data baru supplier', 'success');
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
            $this->supplier_m->update();
            $this->pesan('Update Data Berhasil !', 'Data supplier berhasil diperbarui', 'success');
        } else {
            $this->pesan('Update Data Gagal !', 'Data supplier gagal diperbarui coba cek data anda', 'warning');
        }
        $this->index();
    }

    public function delete($kode)
    {
        $this->db->where('kode', $kode);
        $data = $this->db->get('barang');
        if (empty($data)) {
            $this->supplier_m->delete($kode);
        } else {
            $this->pesan('Hapus Data Gagal !', 'Data supplier gagal dihapus ada data didalamnya', 'warning');
        }
        redirect(site_url('aplikasi/supplier/'));
    }
}
    
    /* End of file Supplier.php */
