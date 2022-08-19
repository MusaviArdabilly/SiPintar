<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class N_perdagangan_bps extends CI_Controller {

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
//        if (!$this->session->userdata('logged_in')) {
//            redirect('login');
//        }
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
                
                $result = $this->M_graph->getNeracaBps($datenow);
                
                $data['pie1'] = $result;
                
                $result2 = $this->M_graph->getNeracaBps($datenow);
                $data['bar'] = $result2;
                
                $result3 = $this->M_graph->getNegEksporBps($datenow);
                $data['barNegaraEkspor'] = $result3;
                
                $result4 = $this->M_graph->getNegImporBps($datenow);
                $data['barNegaraImpor'] = $result4;
                
                
                $result5 = $this->M_graph->getKomoEksporBps($datenow);
                $data['barKomoditiEkspor'] = $result5;
                
                $result6 = $this->M_graph->getKomoImporBps($datenow);
                $data['barKomoditiImpor'] = $result6;
                
                $data['lastmonth'] = $this->M_graph->getBulanBPS($datenow);
                $data['lastmonthI'] = $this->M_graph->getBulanBPSI($datenow);
                
                $data['komolastmonth'] = $this->M_graph->getBulanKomoBPS($datenow);
                $data['komolastmonthI'] = $this->M_graph->getBulanKomoBPSI($datenow);
                $data['neracamonth'] = $this->M_graph->getBulanBPSNeraca($datenow);
                
		$this->load->view('n_perdagangan_bps',$data);
	}
}
