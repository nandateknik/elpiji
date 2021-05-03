<?php class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('penjualan_m');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->data();
    }
    public function data()
    {
        $this->load->view('aplikasi/penjualan/data');
    }
    public function pesan($title, $pesan, $icon)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $pesan . '!",
            icon: "' . $icon . '",
            button: "Confirm",
        });
        </script>';
        $this->session->set_userdata('pesan', $data);
    }
    public function bayar()
    {
        $this->form_validation->set_rules('bayar', 'Bayar', 'required');
        if ($this->form_validation->run()) {
            $this->penjualan_m->saveCart();
            $this->penjualan_m->bayar();
            $this->pesan('Tambah Data Berhasil !', 'Kamu berhasil menambahkan data Pembelian Baru', 'success');
        } else {
            $this->pesan('Tambah Data Gagal !', 'Cek kembali data yang kamu masukan', 'warning');
        }
        redirect(site_url('/aplikasi/penjualan/'));
    }
    public function addCart()
    {
        $this->penjualan_m->addCart();
        redirect(site_url('/aplikasi/penjualan/'));
    }
    public function minusCart()
    {
        $this->penjualan_m->minCart();
    }

    public function plusCart()
    {
        $this->penjualan_m->plsCart();
    }

    public function deleteCartRow($id)
    {
        $this->cart->remove($id);
        redirect(site_url("/aplikasi/penjualan/"));
    }

    public function deleteCart()
    {
        $this->cart->destroy();
        redirect(site_url("/aplikasi/penjualan/"));
    }
}
    
    /* End of file Penjualan.php */
