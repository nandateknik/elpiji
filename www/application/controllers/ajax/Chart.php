<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_m');
    }


    public function bar()
    {
        $getBulan = date('Y-m-d', strtotime('-6 month'));
        $bulan = ['month', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $sendbulan = array();
        $senddata = array();

        for ($i = 0; $i <= 6; $i++) {
            $bulanan =  date('Y-m-d', strtotime($getBulan . ' +' . $i . ' month'));
            $hasil = date("m", strtotime($bulanan));
            $data = $this->ajax_m->getDataBar($hasil, date('Y'));
            if (empty($data)) {
                $data = '0';
            }
            array_push($senddata, $data);
            array_push($sendbulan, $bulan[(int)$hasil]);
        }



        $data = array(
            'bulan' => $sendbulan,
            'data' => $senddata
        );


        echo json_encode($data);
    }

    public function area()
    {
        $tanggal = date('Y-m-d', strtotime('-10 days'));
        $dataTanggal = array();
        $dataarea = array();
        for ($i = 0; $i <= 10; $i++) {
            $get =  date('Y-m-d', strtotime($tanggal . ' +' . $i . ' days'));
            $query = $this->ajax_m->getDataArea($get);
            if (empty($query)) {
                $query = '0';
            }
            array_push($dataarea, $query);
            array_push($dataTanggal, date("d M", strtotime($get)));
        }
        $data = array(
            'tanggal' => $dataTanggal,
            'isi' => $dataarea
        );

        echo json_encode($data);
    }

    public function testing()
    {
        $originalDate = "2010-03-21";
        $newDate = date("d M", strtotime($originalDate));
        echo $newDate;
    }
}
    
    /* End of file Chart.php */
