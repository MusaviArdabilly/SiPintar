<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_impor_negara extends CI_Controller {

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
                $data['negara'] = $this->m_data->getNegara();
		$this->load->view('impor/d_impor_negara',$data);
	}
        
        
        
        public function inputNegaraEkspor(){
            $this->load->model('m_input');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('negara', 'negara', 'required');
                if ($this->form_validation->run() === TRUE) {
                        
                    $negara = $this->input->post('negara');
                    $negara_explode = explode('|', $negara);
            
                    $insert = array(
                        'kd_negara' => $negara_explode[0],
                        'negara'    => $negara_explode[1],
                        'bulan'     => date_format(date_create($this->input->post('bulan_negara')), 'm-Y'),
                        'nilai'     => $this->input->post('nilai'),
                        'created_at'=> date('Y-m-d H:i:s')
                              );

                    $this->m_input->insertNegaraImpor($insert);
                    redirect('Data_impor_negara');
                }
            else {
                $this->load->view('impor/d_impor_negara');
            }
        }
        
}
