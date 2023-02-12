<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agen extends CI_Controller {

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
        $this->load->model('agen_model');
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

	public function index()
	{
        $data['agen'] = $this->agen_model->get();
		$this->load->view('agen/daftar',$data);
	}

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('notelp', 'No Telphone', 'required');  
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {
            if ($this->agen_model->insert()) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menambah Data Agen Baru'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menambah Data Agen Baru'));
            }
            redirect(site_url('agen/tambah'));
        }

        $this->load->view('agen/tambah');
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('notelp', 'No Telphone', 'required');  
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {
            if ($this->agen_model->update($id)) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Mengubah Data Agen'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Mengubah Data Agen'));
            }
            redirect(site_url('agen'));
        }
        $data['agen'] = $this->agen_model->getById($id);
        $this->load->view('agen/edit',$data);
    }

    public function delete($id = null)
    {
        if ($this->agen_model->delete($id)) {
            $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menghapus Data Agen'));
         } else {
             $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menghapus Data Agen'));
         }

         redirect(site_url('agen'));
    }
}