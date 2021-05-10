<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_m');
    }


    public function index()
    {
        $data['countPendapatan'] = $this->dashboard_m->CountPendapatanToday();
        $data['countPenjualan'] = $this->dashboard_m->countPenjualanToday();
        $data['countKeuntungan'] = $this->dashboard_m->countKeuntunganToday();
        $data['countHabis']  = $this->dashboard_m->countBarangHabis();
        $data['dataPendapatan']  = $this->dashboard_m->viewPendapatan();
        $data['dataTerjual'] = $this->dashboard_m->viewBarangTerjual();
        $data['dataKeuntungan'] = $this->dashboard_m->viewKeuntungan();
        $data['dataStok'] = $this->dashboard_m->viewStokHabis();
        $this->load->view('aplikasi/dashboard/index', $data);
    }

    public function ajaxChartBar()
    {
        # code...
    }
}
    
    /* End of file Dashboard.php */
