<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
        $this->load->model('transaksi_model');
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

    public function tambah()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('no_lo', 'No Lo', 'required|is_unique[transaksi.no_lo]');  
        $this->form_validation->set_rules('fee', 'Fee', 'required');

        if ($this->form_validation->run()) {
            if ($this->transaksi_model->insert()) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menambah Data Transaksi Baru'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menambah Data Transaksi Baru'));
            }
            redirect(site_url('transaksi/tambah'));
        }

        $data['agen'] = $this->transaksi_model->getAgen();
        $data['sopir'] = $this->transaksi_model->getSopir();
        $this->load->view('transaksi/tambah',$data);
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi_model->get();
        $this->load->view('transaksi/daftar',$data);
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('fee', 'Fee', 'required');

        if ($this->form_validation->run()) {
            if ($this->transaksi_model->update($id)) {
               $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Edit Data Transaksi'));
            } else {
                $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Edit Data Transaksi'));
            }
            redirect(site_url('transaksi'));
        }

        $data['agen'] = $this->transaksi_model->getAgen();
        $data['sopir'] = $this->transaksi_model->getSopir();
        $data['transaksi'] = $this->transaksi_model->getById($id);
        $this->load->view('transaksi/edit',$data);
    }

    public function delete($id = null)
    {
        if ($this->transaksi_model->delete($id)) {
            $this->session->set_flashdata('msg',$this->alert('success','Berhasil !!!','Kamu Berhasil Menghapus Data Agen'));
        } else {
             $this->session->set_flashdata('msg',$this->alert('error','Gagal !!!','Kamu Gagal Menghapus Data Agen'));
         }

         redirect(site_url('transaksi'));
    }
}