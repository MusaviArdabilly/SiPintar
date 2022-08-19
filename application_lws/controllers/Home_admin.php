<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller {

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
	 * 
	 * author : @enricochesa
	 */
    
    public function __construct() {
            parent::__construct();
            $this->load->model(array('M_graph'));
                    if (!$this->session->userdata('logged_in')) {
                            redirect('login');
                    }
        }
        
	public function index()
	{       
                $datenow =  date("Y");
                $result = $this->M_graph->getNeracaBPS($datenow);
                $data['bandingBpsE'] = $this->M_graph->getBandingBps($datenow);
                $data['bandingBpsI'] = $this->M_graph->getBandingBpsI($datenow);
                $data['pie1'] = $result;
                
                $result2 = $this->M_graph->getNeracaPepi($datenow);
                $data['bandingE'] = $this->M_graph->getBandingPepi($datenow);
                $data['bandingI'] = $this->M_graph->getBandingPepiI($datenow);
                $data['pie2'] = $result2;
                
                $result3 = $this->M_graph->getNeracaPusdatin($datenow);
                $data['bandingPusdaE'] = $this->M_graph->getBandingPusdatin($datenow);
                $data['bandingPusdaI'] = $this->M_graph->getBandingPusdatinI($datenow);
                $data['pie3'] = $result3;
                
		$this->load->view('Home_admin',$data);
	}
        public function geteksporBPS(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableEksporBPS($datenow);
              echo json_encode($result);
        }
         public function getimporBPS(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableImporBPS($datenow);
              echo json_encode($result);
        }
        
        public function geteksporPepi(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableEksporPepi($datenow);
              echo json_encode($result);
        }
         public function getimporPepi(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableImporPepi($datenow);
              echo json_encode($result);
        }
        public function geteksporPusda(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableEksporPusda($datenow);
              echo json_encode($result);
        }
         public function getimporPusda(){
              $datenow =  date("Y");
              $result = $this->M_graph->getTableImporPusda($datenow);
              echo json_encode($result);
        }
}
