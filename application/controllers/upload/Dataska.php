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

class Dataska extends CI_Controller {
    
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
        $this->load->view('dataska/uploadska');       
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
       
       //START FROM ROW 4
        for($row = 4; $row <= $highestRow; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row, NULL, TRUE, FALSE);
               
            $data = array(
           	
                     // Insert data nis dari kolom A di excel
                    'jenis_form'            =>$rowData[0][1], // Insert data nama dari kolom B di excel
                    'no_ska'                =>$rowData[0][2], // Insert data jenis kelamin dari kolom C di excel
                    'tgl_ska'               =>date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][3])),// Insert data alamat dari kolom D di excel
                    'ipskapenerbit'         =>$rowData[0][4], 
                    'ipskaterdaftar'        =>$rowData[0][5],
                    'nama_eksportir'        =>$rowData[0][6],
                    'alamat_eksportir'      =>$rowData[0][7], 
                    'kabkota'               =>$rowData[0][8], 
                    'alamatpabrik'          =>$rowData[0][9],
                    'nama_importir'         =>$rowData[0][10],
                    'uraian_barang'         =>$rowData[0][11],
                    'nohs'                  =>$rowData[0][12],
                    'quantity'              =>$rowData[0][13],
                    'quantity_unit'         =>$rowData[0][14],
                    'berat_kotor'           =>$rowData[0][15],
                    'berat_bersih'          =>$rowData[0][16],
                    'satuan'                =>$rowData[0][17],
                    'fob_usd'               =>$rowData[0][18],
                    'negara_tujuan'         =>$rowData[0][19],
                    'pel_bongkar'           =>$rowData[0][20],
                    'no_serial'             =>$rowData[0][21],
                    'no_invoice'            =>$rowData[0][22],
                    'tgl_invoice'           =>date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][23])),
                    'moda'                  =>$rowData[0][24],
                    'vessel'                =>$rowData[0][25],
                    'origin_criterion'      =>$rowData[0][26],
                    'user_proses'           =>$rowData[0][27],
                    'uploaded_at'           =>date('Y-m-d H:i:s'),
                   
                );

           $this->m_data->uploadExcel("t_ska",$data);
        }
            
        redirect("upload/Dataska"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }

    
}
