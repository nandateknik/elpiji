<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');
    }

    public function alert($icon,$title,$text)
    {
        $script = "
        <script>
        Swal.fire({
            icon: '".$icon."',
            title: '".$title."',
            text: '".$text."',
          })
          </script>
          ";
          return $script;
    }
    public function logout()
    {
        session_destroy();
        redirect(site_url('auth/login'));
    }
    
    public function login()
    {
        if ($this->session->has_userdata('id') != null) {
            redirect(site_url());
        }

        if ($this->input->method() === 'post') {
            $login = $this->auth_model->login();
            $session = array(
                'id' => $login['id'],
                'username' => $login['username'],
                'nama' => $login['nama'],
                'role' => $login['role']
            );
            
            if ($login) {
                $this->session->set_userdata($session);
                $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Login kedalam Aplikasi'));
                redirect(site_url());
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Masuk Kedalam Aplikasi'));
            }
        }
        $this->load->view('auth/login');
    }
}