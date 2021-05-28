<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('welcome_m');
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
		$this->login();
	}

	public function login()
	{
		if ($this->session->userdata('login')) {
			redirect(site_url('/aplikasi/dashboard'));
		}
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$this->welcome_m->login();
			$login = $this->session->login;
			if ($login) {
				$this->pesan('Behasil Login!', 'Kamu telah berhasil melakukan login ke aplikasi', 'success');
				redirect(site_url('/aplikasi/dashboard'));
			} else {
				$this->pesan('Gagal Login!', 'Coba periksa username dan password kembali', 'warning');
				redirect(site_url());
			}
		}
		$this->load->view('welcome/login');
	}

	public function logout()
	{
		session_destroy();
		redirect(site_url());
	}
}
