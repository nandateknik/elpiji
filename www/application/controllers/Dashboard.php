<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('dashboard_model');
		if ($this->session->has_userdata('id') == null) {
            redirect(site_url('auth/login'));
        }
	}
	public function index()
	{
		$data['total_transaksi'] = $this->dashboard_model->sumtransaksi();
		$data['total_fee'] = $this->dashboard_model->sumfee();
		$data['total_agen'] = $this->dashboard_model->sumagen();
		$data['total_gain'] = $this->dashboard_model->sumgain();

		$data['total_januari'] = $this->dashboard_model->sumBulan('01');
		$data['total_februari'] = $this->dashboard_model->sumBulan('02');
		$data['total_maret'] = $this->dashboard_model->sumBulan('03');
		$data['total_april'] = $this->dashboard_model->sumBulan('04');
		$data['total_mei'] = $this->dashboard_model->sumBulan('05');
		$data['total_juni'] = $this->dashboard_model->sumBulan('06');
		$data['total_juli'] = $this->dashboard_model->sumBulan('07');
		$data['total_agustus'] = $this->dashboard_model->sumBulan('08');;
		$data['total_september'] = $this->dashboard_model->sumBulan('09');
		$data['total_oktober'] = $this->dashboard_model->sumBulan('10');
		$data['total_november'] = $this->dashboard_model->sumBulan('11');
		$data['total_desember'] = $this->dashboard_model->sumBulan('12');
		$this->load->view('dashboard',$data);
	}
}
