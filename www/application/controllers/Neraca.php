<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {

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
        $this->load->model('neraca_model');
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
        $data['neraca'] = $this->neraca_model->get();
        $this->load->view('neraca/daftar',$data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('tangki_awal', 'Isi Awal', 'required');
        $this->form_validation->set_rules('tangki_isi', 'Isi Ulang', 'required');
        $this->form_validation->set_rules('tangki_akhir', 'Isi Akhir', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|is_unique[neraca.tanggal]');

        if ($this->form_validation->run()) {
            if ($this->neraca_model->insert()) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Mengubah Data Neraca'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Mengubah Data Neraca'));
            }
            redirect(site_url('neraca'));
        }

        $this->load->view('neraca/tambah');
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('tangki_isi', 'Isi Ulang', 'required');
        $this->form_validation->set_rules('tangki_akhir', 'Isi Akhir', 'required');

        if ($this->form_validation->run()) {
            if ($this->neraca_model->update($id)) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Mengubah Data Neraca'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Mengubah Data Neraca'));
            }
            redirect(site_url('neraca'));
        }

        $data['neraca'] = $this->neraca_model->getById($id);
        $this->load->view('neraca/edit',$data);
    }
    public function delete($id = null)
    {
        if ($this->neraca_model->delete($id)) {
            $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menghapus Data neraca'));
         } else {
             $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menghapus Data neraca'));
         }

         redirect(site_url('neraca'));
    }

    }