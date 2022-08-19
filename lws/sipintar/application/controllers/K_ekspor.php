<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class K_ekspor extends CI_Controller {

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
	{
		$this->load->view('k_ekspor');
	}
        
        
        public function inputdata(){
            $this->load->model('m_input');
            
            $insert = array(
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),

                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),

                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1'),
                        'nil1'       => $this->input->post('nil1')
                        );
            
            $this->m_input->insert($insert);
            
        }
}
