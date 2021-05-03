<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Select extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_m');
        $this->load->library('cart');
    }


    public function getSupplier()
    {
        $post = $this->input->post('search');
        $data = $this->ajax_m->getSupplier($post);
        echo json_encode($data);
    }

    public function getBarang()
    {
        $post = $this->input->post('search');
        $data = $this->ajax_m->getBarang($post);
        echo json_encode($data);
    }

    public function getBarangData()
    {
        $post = $this->input->post('kode');
        $data = $this->ajax_m->getBarangData($post);
        echo json_encode($data);
    }

    public function addCart()
    {
        if (!empty($this->input->post())) {
            $data = array(
                array(
                    'id'      => 1,
                    'qty'     => 1,
                    'price'   => 1000,
                    'name'    => 'baju'
                )
            );
            $this->cart->insert($data);
        }
        echo json_encode($this->input->post());
    }
}
    
    /* End of file Barang.php */
