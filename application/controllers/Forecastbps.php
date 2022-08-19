<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecastbps extends CI_Controller {

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
	public function index()
	{        $this->load->model('M_data');
            $firstmonth =date("Y-01");
            $datenow =  date("Y-m");
                $data['forecast'] = $this->M_data->getForecastTHBPS($firstmonth,$datenow);
                $data['forecastsum'] = $this->M_data->getForecastTHsumBPS($firstmonth,$datenow);
                
                $data['forecasti'] = $this->M_data->getForecastITHBPS($firstmonth,$datenow);
                $data['forecastisum'] = $this->M_data->getForecastITHsumBPS($firstmonth,$datenow);
                
		$this->load->view('forecastbps',$data);
	}
        
        public function filter(){
              $this->load->model('M_data');
           $firstbul =  date_format(date_create($this->input->post('firstbultah')), 'Y-m');
           
           $lastbul =  date_format(date_create($this->input->post('lastbultah')), 'Y-m');
           
           if($firstbul!=null&&$lastbul!=null){
            $firstmonth = $firstbul;
            $datenow = $lastbul;
           }else{
            $firstmonth =date("Y-01");
            $datenow =  date("Y-m");
               
           }
                $data['forecast'] = $this->M_data->getForecastTHBPS($firstmonth,$datenow);
                $data['forecastsum'] = $this->M_data->getForecastTHsumBPS($firstmonth,$datenow);
                
                $data['forecasti'] = $this->M_data->getForecastITHBPS($firstmonth,$datenow);
                $data['forecastisum'] = $this->M_data->getForecastITHsumBPS($firstmonth,$datenow);
                
		$this->load->view('forecastbps',$data);
        }
	
	
	
// 	OLD FORECAST
// 		public function index()
// 	{       $this->load->model('M_data');
//                 $data['forecast'] = $this->M_data->getForecast();
//                 $data['forecasti'] = $this->M_data->getForecastI();
                
// 		$this->load->view('forecast_old',$data);
// 	}
}
