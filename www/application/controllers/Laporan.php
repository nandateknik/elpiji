<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
        $this->load->model('laporan_model');
        $this->load->library('form_validation');
		if ($this->session->has_userdata('id') == null) {
            redirect(site_url('auth/login'));
        }
    }

	public function sallary()
	{
        if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');  
	
				if ($this->form_validation->run()) {
					$post = $this->input->post();
					$newdata = array(
						'id_agen' => $post['id'],
						'awal'  => $post['tanggal_awal'],
						'akhir'     => $post['tanggal_akhir'],
					);
					$this->session->set_userdata($newdata);
					$data['sallary'] = $this->laporan_model->getSallary();
				} 
			}
			$data['agen'] = $this->laporan_model->getagen();
			$this->load->view('laporan/sallary',$data);
	}

	public function gain()
	{
        if ($this->input->method() === 'post') {
			$this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
			$this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');  
	
			if ($this->form_validation->run()) {
				$post = $this->input->post();
				$newdata = array(
					'awal'  => $post['tanggal_awal'],
					'akhir'     => $post['tanggal_akhir'],
				);
				$this->session->set_userdata($newdata);
				$data['gain'] = $this->laporan_model->getGain();
		        $this->load->view('laporan/gain',$data);
			} else{
				redirect(site_url('laporan/gain'));
			}
			} else {
				$this->load->view('laporan/gain');
			}
	}

	public function exportGain()
	{
		$data['gain'] = $this->laporan_model->getGain();
		$this->load->view('laporan/exportgain',$data); 
	}
	public function exportSallary()
	{
		$data['sallary'] = $this->laporan_model->getSallary();
		$this->load->view('laporan/exportsallary',$data); 
	}
}
