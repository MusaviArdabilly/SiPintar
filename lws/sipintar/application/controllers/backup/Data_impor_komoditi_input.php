<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_impor_komoditi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    
//        public function __construct() {
//            parent::__construct();
//            $this->load->model(array('m_input'));
//            //        if (!$this->session->userdata('logged_in')) {
//                //            redirect('login');
//            //        }
//        }
        
	public function index()
	{  
                $this->load->model('m_data');
                $data['HS'] = $this->m_data->getHS();
		$this->load->view('impor/d_impor_komoditi',$data);
	}
        
        
        
        public function inputKomoditiEkspor(){
            $this->load->model('m_input');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('hs2', 'hs2', 'required');
                if ($this->form_validation->run() === TRUE) {
                        
                    
                    $hs2 = $this->input->post('hs2');
                    $hs2_explode = explode('|', $hs2);
            
                    $insert = array(
                        'hs2digit'    => $hs2_explode[0],
                        'komoditi'    => $hs2_explode[1],
                        'bulan'     => date_format(date_create($this->input->post('bulan_komoditi')), 'm-Y'),
                        'nilai'     => $this->input->post('nilai'),
                        'created_at'=> date('Y-m-d H:i:s')
                              );

                    $this->m_input->insertKomoditiImpor($insert);
                    redirect('Data_impor_komoditi');
                }
            else {
                $this->load->view('impor/d_impor_komoditi');
            }
        }
        
}
