<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pm');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');

        if ($this->form_validation->run()) {
            $data['penjualan'] = $this->laporan_pm->getPenjualan();
            $data['penjualan2'] = $this->laporan_pm->getPenjualanTotal();
        } else {
            $data = null;
        }
        $this->load->view('laporan/penjualan/data', $data);
    }
}
    
    /* End of file Penjualan.php */
