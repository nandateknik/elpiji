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
        $this->load->view('aplikasi/dashboard/index');
    }
}
    
    /* End of file Dashboard.php */
