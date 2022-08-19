<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
            //        if (!$this->session->userdata('logged_in')) {
                //            redirect('login');
            //        }
        }
        
	public function index()
	{
                $data['agenda'] = $this->m_data->getAgenda();
                
                $data['agendanotnull'] = $this->m_data->getAgendaNotNull();
		$this->load->view('agenda',$data);
	}
        
        
        public function updateAgenda(){
            $this->load->model('m_data');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_agenda', 'nama_agenda', 'required');
                if ($this->form_validation->run() === TRUE) {

            $agenda = $this->input->post('nama_agenda');
            $agenda_explode = explode('|', $agenda);
            
            
                    $insert = array(
                        'nama_agenda'   => $agenda_explode[1],
                        'nilai'         => $this->input->post('nilai'),
                        'updated_at'    => date('Y-m-d H:i:s')
                              );

                    $this->m_data->updateAgenda($agenda_explode[0],$insert);
                    redirect('Agenda');
                }
            else {
                $this->load->view('Agenda');
            }
        }
        
}
