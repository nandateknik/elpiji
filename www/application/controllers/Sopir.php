<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sopir extends CI_Controller {

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
        $this->load->model('sopir_model');
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
        $data['sopir'] = $this->sopir_model->get();
		$this->load->view('sopir/daftar',$data);
	}

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('notelp', 'No Telphone', 'required');  
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {
            if ($this->sopir_model->insert()) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menambah Data sopir Baru'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menambah Data sopir Baru'));
            }
            redirect(site_url('sopir/tambah'));
        }

        $this->load->view('sopir/tambah');
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('notelp', 'No Telphone', 'required');  
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run()) {
            if ($this->sopir_model->update($id)) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Mengubah Data sopir'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Mengubah Data sopir'));
            }
            redirect(site_url('sopir'));
        }
        $data['sopir'] = $this->sopir_model->getById($id);
        $this->load->view('sopir/edit',$data);
    }

    public function delete($id = null)
    {
        if ($this->sopir_model->delete($id)) {
            $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menghapus Data sopir'));
         } else {
             $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menghapus Data sopir'));
         }

         redirect(site_url('sopir'));
    }
}