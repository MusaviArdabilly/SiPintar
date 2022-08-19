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

class E_pusdatin extends CI_Controller {
    
    private $filename = "dataexpor";

//    public function __construct() {
//        parent::__construct();
//        $this->load->model(array('data_m'));
//
////        if (!$this->session->userdata('logged_in')) {
////            redirect('C_login');
////        }
//    }
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }   
    public function index() {
//        $data['status'] = $this->data_m->get_status();
        $this->load->view('entry/entry_pusdatin');       
    }

    public function upload_excel(){
        $this->load->model(array('m_data','excel_m'));
        $this->excel_m->upload_file($this->filename.date("Y_m_d"));
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.date("Y_m_d").'.xlsx'); // Load file yang telah diupload ke folder excel
       
        $sheet          = $loadexcel->getSheet(0);
        $highestRow     = $sheet->getHighestRow();
        $highestColumn  = $sheet->getHighestColumn();
        for($row = 1; $row <= $highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL, TRUE, FALSE);
               
            $data = array(
                    'kode_propinsi' =>$rowData[0][0], // Insert data nis dari kolom A di excel
                    'nama_propinsi' =>$rowData[0][1], // Insert data nama dari kolom B di excel
                    'kode_hs'       =>$rowData[0][2], // Insert data jenis kelamin dari kolom C di excel
                    'deskripsi'     =>$rowData[0][3], // Insert data alamat dari kolom D di excel
                    'negara'        =>$rowData[0][4], 
                    'kode_industri' =>$rowData[0][5],
                    'diskripsi_hs'  =>$rowData[0][6],
                    'bulan'         =>$rowData[0][7], 
                    'berat'         =>$rowData[0][8], 
                    'nilai'         =>$rowData[0][9],
                    'tahun'         =>date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][10])),
                    'kd_ekspor_impor' =>$rowData[0][11],
                    'uploaded_at'   =>date('Y-m-d H:i:s'),
                   
                );

           $this->m_data->uploadExcelPusdatin($data);
        }
            
        redirect("E_pusdatin"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }

    
}
