<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_Impor extends CI_Controller {

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
	{       $this->load->model('M_data');
                $datenow =  date("Y");
                $datebefore = date('Y', strtotime('-1 years'));
                
                
                $dbefore1 = date('Y-m', strtotime('-1 month'));
                $dbefore2 = date('Y-m', strtotime('-2 month'));
                
                
                $md = date('m-d', strtotime('last day of -1 month'));
                
                
//                $data['kinerja']    = $this->M_data->getKinerjaI($datenow);
//                $data['sektor']     = $this->M_data->getSektorI($datenow);
                
                
                $data['kinerja']    = $this->M_data->getKinerjaI($dbefore1,$dbefore2,$datenow,$datebefore,$md);
                $data['sektor']     = $this->M_data->getSektorI($dbefore1,$dbefore2,$datenow,$datebefore,$md);
                
                $data['komoditi']               = $this->M_data->getKomoditiI($dbefore1,$dbefore2,$datenow,$datebefore,$md);
                $data['komodititotal']          = $this->M_data->getKomoditiITotal($dbefore1,$dbefore2,$datenow,$datebefore,$md);
                $data['komodititotallain']      = $this->M_data->getKomoditiITotalLain($dbefore1,$dbefore2,$datenow,$datebefore,$md);
                
                
                $data['negara']                 = $this->M_data->getNegaraI($dbefore1,$dbefore2,$datenow,$datebefore,$md);
		$data['negaratotal']            = $this->M_data->getNegaraITotal($dbefore1,$dbefore2,$datenow,$datebefore,$md);
		$data['negaratotallain']        = $this->M_data->getNegaraITotallain($dbefore1,$dbefore2,$datenow,$datebefore,$md);
		
                //AMCHART//
                
                $result = $this->M_graph->getPieAMI($datenow);
                
                $data['pie1'] = $result;
                
                $result2 = $this->M_graph->getBarAMI($datenow);
                $data['bar'] = $result2;
                
		$this->load->view('impor/t_impor',$data);
	}
        
}
