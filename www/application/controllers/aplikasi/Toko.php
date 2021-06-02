<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('toko_m');
    }


    public function index()
    {
        $data['toko'] = $this->toko_m->get();
        $this->load->view('welcome/toko', $data);
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
    public function update($id)
    {
        if (!empty($this->input->post())) {
            $this->toko_m->update($id);
            $this->pesan('Update Data Berhasil !', 'Kamu berhasil update data baru ', 'success');
        } else {
            $this->pesan('Update Data Gagal !', 'Kamu gagal update data baru ', 'warning');
        }
        redirect(site_url('aplikasi/toko/'));
    }
}

/* End of file Toko.php */
