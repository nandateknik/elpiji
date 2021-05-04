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
        $this->load->view('aplikasi/dashboard/index', $data);
    }
}
    
    /* End of file Dashboard.php */
