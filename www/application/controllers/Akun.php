<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
        $this->load->model('akun_model');
        $this->load->library('form_validation');
        
        if ($this->session->has_userdata('id') == null) {
            redirect(site_url('auth/login'));
        }
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

    public function setting()
    {
        if ($this->input->method() === 'post') {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');  

            if ($this->form_validation->run()) {
                if ($this->akun_model->update()) {
                    $this->session->unset_userdata('nama');
                    $this->akun_model->getNewSession();
                    $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menambah Data sopir Baru'));
                 } else {
                     $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menambah Data sopir Baru'));
                 }
                 redirect(site_url('dashboard'));
            } 
        }
        $data['akun'] = $this->akun_model->getById();
        $this->load->view('akun/setting',$data);
    }
}