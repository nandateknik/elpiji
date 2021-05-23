<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_m');
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

    public function detail()
    {
        $data['user'] = $this->user_m->getById();
        $this->load->view('aplikasi/user/detail', $data);
    }

    public function updateProfile($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run()) {
            $this->user_m->updateProfile($id);
            $this->pesan('Update Data Berhasil !', 'Kamu berhasil update data baru ', 'success');
        } else {
            $this->pesan('Update Data Gagal !', 'Kamu gagal update data baru ', 'warning');
        }
        redirect(site_url('/aplikasi/user/detail'));
    }

    public function updatePassword($id)
    {
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run()) {
            if (!empty($this->user_m->updatePassword($id))) {
                $this->pesan('Update Password Berhasil !', 'Kamu berhasil update password baru ', 'success');
            } else {
                $this->pesan('Update Password Gagal !', 'Password lama salah coba periksa kembali data yang di kirimkan ', 'warning');
            }
        } else {
            $this->pesan('Data bermasalah atau kosong !', 'Coba periksa data yang dikirimkan ', 'warning');
        }
        $this->detail();
    }
}
    
    /* End of file User.php */
