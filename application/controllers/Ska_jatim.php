<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ska_jatim extends CI_Controller {

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
        $this->load->model(array('M_data','M_graph'));
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
	public function index()
	{
            //===================CHART JS===================//
//                $result     = $this->M_graph->getPieNeraca();
//                $nilaipie   = array();
//                foreach ($result as $key => $value) {
//                    array_push($nilaipie, (int) $value->nilai);
//                }
//                $data['data_pie']['nilaipie'] = $nilaipie;
                
                
                
                $datenow =  date("Y");
                
                
                $result = $this->M_graph->getNeracaPusdatin($datenow);
                
                $data['pie1'] = $result;
                
                $result2 = $this->M_graph->getNeracaPusdatin($datenow);
                $data['bar'] = $result2;
                
                
                
                
                $result3 = $this->M_graph->getNegEksporSKA($datenow);
                $data['barNegaraEkspor'] = $result3;
                
                $result5 = $this->M_graph->getKomoEksporSKA($datenow);
                $data['barKomoditiEkspor'] = $result5;
                
                $result6 = $this->M_graph->getFormSKA($datenow);
                $data['barFormSKA'] = $result6;
                
                $result4 = $this->M_graph->getjumlahForm($datenow);
                $data['barJumlahForm'] = $result4;
                
                 $result7 = $this->M_graph->getFormDAB($datenow);
                $data['barFormDAB'] = $result7;
                
                $result8 = $this->M_graph->getjumlahFormDAB($datenow);
                $data['barJumlahFormDAB'] = $result8;
		$this->load->view('ska_jatim',$data);
	}
}
