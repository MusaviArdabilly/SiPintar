<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_penyelenggara extends CI_Controller {

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
            $this->load->model(array('m_data','m_entri'));
                    if (!$this->session->userdata('logged_in')) {
                            redirect('login');
                    }
        }
        
	public function index()
	{
                $data['pl'] = $this->m_data->getPL();
		$this->load->view('v_penyelenggara',$data);
	}
        
        public function edit($id){
          $data['pl'] = $this->m_data->getPL();
          $data['edit_pl'] = $this->m_data->editPL($id);
          $this->load->view('edit_pl',$data);
        }
        
        public function deletePL(){
            $id = $this->input->post('id');
            $this->m_data->delete_pl($id);
            redirect('E_penyelenggara');
        }
        
        public function inputData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_pl', 'nm_pl', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'nama'          => $this->input->post('nm_pl'),
                        'alamat'        => $this->input->post('almt_pl'),
                        'contact_person'=> $this->input->post('cp_pl'),
                        'no_telp'       => $this->input->post('no_pl'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    $this->m_entri->dataPL($insert);
                    redirect('E_penyelenggara');
                }
            else {
                $data['pl'] = $this->m_data->getPL();
		$this->load->view('v_penyelenggara',$data);
            }
        }
        
         public function updateData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_pl', 'nm_pl', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                         'nama'          => $this->input->post('nm_pl'),
                        'alamat'        => $this->input->post('almt_pl'),
                        'contact_person'=> $this->input->post('cp_pl'),
                        'no_telp'       => $this->input->post('no_pl'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    
                    $id = $this->input->post('id');
                    $this->m_data->updatePL($id,$insert);
                    redirect('E_penyelenggara');
                }
            else {
                $data['pl'] = $this->m_data->getPL();
		$this->load->view('v_penyelenggara',$data);
            }
        }
        
}
