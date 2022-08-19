<?php

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 6000);
//panggil dulu autoload library
require_once 'application/third_party/Spout/Autoloader/autoload.php';

//definisikan class2 yg akan kamu gunakan dari Spout ini
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\BorderBuilder;

class E_bps_negara extends CI_Controller {

    private $filename = "dataexpor";

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_data'));
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $data['negara'] = $this->M_data->getNegaraSearch();
        $this->load->view('entry/entry_bps_negara', $data);
    }

    public function upload_excel() {
        $this->load->model(array('m_data', 'excel_m'));
        $this->excel_m->upload_file($this->filename . date("Y_m_d"));
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . date("Y_m_d") . '.xlsx'); // Load file yang telah diupload ke folder excel

        $sheet = $loadexcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            $data = array(
                'negara' => $rowData[0][0], // Insert data nis dari kolom A di excel
                'nilai' => $rowData[0][2], // Insert data jenis kelamin dari kolom C di excel
                'exim' => $rowData[0][3], // Insert data alamat dari kolom D di excel   
                'uploaded_at' => date('Y-m-d H:i:s'),
            );

            $this->m_data->uploadExcelBpsNegara($data);
        }

        redirect("E_bps_negara"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }

    public function inputData() {
        $this->load->model('m_entri');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('exim', 'exim', 'required');
        if ($this->form_validation->run() === TRUE) {
            $insert = array(
                'exim' => $this->input->post('exim'),
                'negara' => $this->input->post('negara'),
                'bulan_tahun' => date_format(date_create($this->input->post('bultah')), 'Y-m-d'),
                'nilai' => $this->input->post('nilai'),
                'uploaded_at' => date('Y-m-d H:i:s'),
            );

            $this->m_entri->insert("bps_negara_tujuan_asal", $insert);
            redirect("E_bps_negara");
        } else {
            $data['negara'] = $this->M_data->getNegaraSearch();
            $this->load->view('entry/entry_bps_negara', $data);
        }
    }

}
