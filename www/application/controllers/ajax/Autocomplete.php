<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{

    public function getBarangData()
    {
        $post = $this->input->post('kode');
        $data['barang'] = $this->ajax_m->getBarangData($post);
        return $this->load->view('aplikasi/penjualan/autocomplete', $data);
    }
}
    
    /* End of file Autocomplete.php */
