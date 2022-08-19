<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_impor extends CI_Controller {

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
    
    
        public function __construct() {
            parent::__construct();
            $this->load->model(array('m_data'));
                    if (!$this->session->userdata('logged_in')) {
                            redirect('login');
                    }
        }
        
	public function index()
	{
                $data['non_migas'] = $this->m_data->getImpNonMigas();
		$this->load->view('impor/d_impor',$data);
	}
        
        
        
        public function inputSektor(){
            $this->load->model('m_input');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('migas', 'migas', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'kategori'  => $this->input->post('migas'),
                        'sektor'    => $this->input->post('sektor'),
                        'bulan'     => date_format(date_create($this->input->post('bulan_sektor')), 'm-Y'),
                        'nilai'     => $this->input->post('nilai'),
                        'created_at'=> date('Y-m-d H:i:s')
                              );

                    $this->m_input->insertSektorI($insert);
                    redirect('Data_impor');
                }
            else {
                $this->load->view('impor/d_impor');
            }
        }
        
}
