<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_pm');
        $this->load->library('form_validation');
        $this->load->library('pdf');
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

    public function index()
    {
        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');

        if ($this->form_validation->run()) {
            $data['penjualan'] = $this->laporan_pm->getPenjualan();
            $this->pesan('Pencarian Data Berhasil !', 'Kamu berhasil melakukan pencarian data penjualan', 'success');
        } else {
            $data = null;
        }
        $this->load->view('laporan/penjualan/data', $data);
    }

    public function cetak()
    {

        $data =  $this->laporan_pm->getCetakPenjualan();
        if (empty($data)) {
            redirect(site_url('laporan/penjualan'));
        }

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');

        $i = 0;
        $html = '
            <div style="text-align:center; margin:0; padding:0;">
            <h1>LAPORAN PENJUALAN RANGKUM <br> TOKO SINDA BANYUWANGI</h1>
            <P>Jl. Yos Sudarso no 72, Klatak, Banyuwangi. Telp: 082331201148</P>
            </div>
            <table border="1px" cellpadding="3">
                <tr cellspacing="1" bgcolor="#ffffff">
                    <th align="center"><b>Tanggal</b></th>
                    <th align="center"><b>Pendapatan</b></th>
                    <th align="center"><b>Keuntungan</b></th>
                </tr>';
        foreach ($data as $row) {
            $i++;
            $html .= '<tr>
                                    <td align ="center">' . $row->tanggal . '</td>
                                    <td align ="center"> Rp. ' . number_format($row->total) . '</td>
                                    <td align="center"> Rp. ' . number_format($row->keuntungan) . '</td>
                                </tr>';
        }

        $sum = 0;
        $sum2 = 0;
        foreach ($data as $key => $value) {
            if (isset($value->total)) {
                $sum += $value->total;
                $sum2 += $value->keuntungan;
            }
        };

        $html .= '<tr>
        <th align ="center"><b>Total</b></th>
        <th align ="center"><b> Rp. ' . number_format($sum) . '</b></th>
        <th align="center"><b> Rp. ' . number_format($sum2) . '</b></th>
        </tr>';

        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('laporan_rangkum_' . $this->session->userdata('start') . '_' . $this->session->unset_userdata('end') . '.pdf', 'D');
        $this->session->unset_userdata('start');
        $this->session->unset_userdata('end');
    }

    public function barang()
    {
        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');

        if ($this->form_validation->run()) {
            $data['barang'] = $this->laporan_pm->getBarangById();
            $this->pesan('Pencarian Data Berhasil !', 'Kamu berhasil melakukan pencarian data penjualan barang', 'success');
        } else {
            $data = null;
        }
        $this->load->view('laporan/penjualan/barang', $data);
    }

    public function cetakBarang()
    {

        $data =  $this->laporan_pm->CetakBarangById();
        if (empty($data)) {
            redirect(site_url('laporan/penjualan'));
        }

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
        $sum_jumlah = 0;
        $sum_untung = 0;
        $sum_subtotal = 0;
        foreach ($data as $key => $value) {
            if (isset($value->jumlah)) {
                $sum_jumlah += $value->jumlah;
                $sum_untung += $value->untung;
                $sum_subtotal += $value->subtotal;
                $nama_item = $value->nama;
            }
        };
        $i = 0;
        $html = '
            <h1 style="text-align:center;">LAPORAN PENJUALAN RANGKUM <br> TOKO SINDA BANYUWANGI</h1>
            <p style="text-align:center; border-bottom:0.5px solid;">Jl. Yos Sudarso no 72, Klatak, Banyuwangi. Telp: 082331201148</p>
            <br>
            <P>
            Nama Item : ' . $nama_item . '<br>
            Priode Tanggal : ' . $this->session->userdata('start') . '/' . $this->session->userdata('end') . '
            </P>
           
            <table border="1px" cellpadding="3">
                <tr cellspacing="1" bgcolor="#ffffff">
                    <th align="center"><b>Tanggal</b></th>
                    <th align="center"><b>Jumlah</b></th>
                    <th align="center"><b>Harga Beli</b></th>
                    <th align="center"><b>Harga Jual</b></th>
                    <th align="center"><b>Keuntungan</b></th>
                    <th align="center"><b>Subtotal</b></th>
                </tr>';
        foreach ($data as $row) {
            $i++;
            $html .= '<tr>
                                    <td align ="center">' . $row->tanggal . '</td>
                                    <td align ="center">' . $row->jumlah . '</td>
                                    <td align ="center"> Rp. ' . number_format($row->harga_beli) . '</td>
                                    <td align="center"> Rp. ' . number_format($row->harga_jual) . '</td>
                                    <td align="center"> Rp. ' . number_format($row->untung) . '</td>
                                    <td align="center"> Rp. ' . number_format($row->subtotal) . '</td>
                                </tr>';
        }
        $html .= '
        <tr align ="center">
            <th><b>TOTAL</b></th>
            <th><b>' . $sum_jumlah . '</b></th>
            <th colspan="2"></th>
            <th><b>Rp. ' . number_format($sum_untung) . '</b></th>
            <th><b>Rp. ' . number_format($sum_subtotal) . '</b></th>
        </tr>
        ';
        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('laporan_' . $nama_item . '_' . $this->session->userdata('start') . '_' . $this->session->userdata('end') . '.pdf', 'D');
        $this->session->unset_userdata('start');
        $this->session->unset_userdata('end');
        $this->session->unset_userdata('kode_brg');
    }
}
    
    /* End of file Penjualan.php */
