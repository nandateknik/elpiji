<?php class Penjualan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_pm');
    }


    public function index()
    {
        $this->data();
    }

    public function data()
    {
        $data['transaksi'] = $this->transaksi_pm->get();
        $this->load->view('transaksi/penjualan/data', $data);
    }

    public function detail($nota)
    {
        $data['transaksi'] = $this->transaksi_pm->getByNota($nota);
        $data['penjualan'] = $this->transaksi_pm->getPenjualan($nota);
        $this->load->view('transaksi/penjualan/detail', $data);
    }
}
    
    /* End of file penjualan.php */
