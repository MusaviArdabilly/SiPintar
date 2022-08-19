<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N_perdagangan_provjatim extends CI_Controller {

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
                
                $result = $this->M_graph->getNeracaPepi($datenow);
                
                $data['pie1'] = $result;
                
                $result2 = $this->M_graph->getNeracaPepi($datenow);
                $data['bar'] = $result2;
                
                $result3 = $this->M_graph->getNegEksporPepi($datenow);
                $data['barNegaraEkspor'] = $result3;
                
                $result4 = $this->M_graph->getNegImporPepi($datenow);
                $data['barNegaraImpor'] = $result4;
                
                
                $result5 = $this->M_graph->getKomoEksporPepi($datenow);
                $data['barKomoditiEkspor'] = $result5;
                
                $result6 = $this->M_graph->getKomoImporPepi($datenow);
                $data['barKomoditiImpor'] = $result6;
                
		$this->load->view('n_perdagangan_provjatim',$data);
	}
}
