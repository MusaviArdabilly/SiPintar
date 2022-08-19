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

class E_bps_10komoditi extends CI_Controller {
    
    private $filename = "dataexpor";

    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_data'));
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }   
    public function index() {
        $data['hscode'] = $this->M_data->getHS();
        $this->load->view('entry/entry_bps_10komoditi',$data);       
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
                    'kode_hs'           =>$rowData[0][0], // Insert data nis dari kolom A di excel
                    'uraian_hs'         =>$rowData[0][1], // Insert data nama dari kolom B di excel
                    'bulan_tahun'       =>date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][2])), // Insert data jenis kelamin dari kolom C di excel
                    'nilai'             =>$rowData[0][3], // Insert data alamat dari kolom D di excel
                    'ekspor_impor'      =>$rowData[0][4],     
                    'uploaded_at'       =>date('Y-m-d H:i:s'),
                   
                );

           $this->m_data->uploadExcelBpsKomoditi($data);
        }
            
        redirect("E_bps_10komoditi"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }  
    public function inputData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('exim', 'exim', 'required');
            $hscode = $this->input->post('hscode');
            $$hscode_explode = explode('|', $hscode);
                if ($this->form_validation->run() === TRUE) {
                    $insert = array(
                        'ekspor_impor'      => $this->input->post('exim'),
                        'kode_hs'           => $$hscode_explode[0],
                        'uraian_hs'         => $$hscode_explode[1],
                        'bulan_tahun'       => date_format(date_create($this->input->post('bultah')), 'Y-m-d'),
                        'nilai'             => $this->input->post('nilai'),
                        'uploaded_at'       => date('Y-m-d H:i:s'),
                              );

                    $this->m_entri->insert("bps_10komoditi",$insert);
                     redirect("E_bps_10komoditi");
                }
            else {
        $data['hscode'] = $this->M_data->getHS();
        $this->load->view('entry/entry_bps_10komoditi',$data);       
            }
        }

    
}
