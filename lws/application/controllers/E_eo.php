<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_eo extends CI_Controller {

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
                $data['eo'] = $this->m_data->getEO();
		$this->load->view('v_eo',$data);
	}
        
        public function edit($id){
          $data['eo'] = $this->m_data->getEO();
          $data['edit_eo'] = $this->m_data->editEO($id);
          $this->load->view('edit_eo',$data);
        }
        
        public function deleteEO(){
            $id = $this->input->post('id');
            $this->m_data->delete_eo($id);
            redirect('E_eo');
        }
        
        public function inputData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_eo', 'nm_eo', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'nama'          => $this->input->post('nm_eo'),
                        'alamat'        => $this->input->post('almt_eo'),
                        'contact_person'=> $this->input->post('cp_eo'),
                        'no_telp'       => $this->input->post('no_eo'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    $config['upload_path'] = './assets/img/eo/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                    $config['max_size'] = 2048;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    
                    if (!empty($_FILES['filesiup']['name'])) {
                        if (!$this->upload->do_upload('filesiup')) {
                            echo 'File SIUP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filesiup'] = $upload['file_name'];
                        }
                    }
                    //bukti2
                    if (!empty($_FILES['filenpwp']['name'])) {
                        if (!$this->upload->do_upload('filenpwp')) {
                            echo 'File NPWP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenpwp'] = $upload['file_name'];
                        }
                    }
                    

                    $this->m_entri->dataEO($insert);
                    redirect('E_eo');
                }
            else {
                $data['eo'] = $this->m_data->getEO();
		$this->load->view('v_eo',$data);
            }
        }
        
         public function updateData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_eo', 'nm_eo', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'nama'          => $this->input->post('nm_eo'),
                        'alamat'        => $this->input->post('almt_eo'),
                        'contact_person'=> $this->input->post('cp_eo'),
                        'no_telp'       => $this->input->post('no_eo'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    $config['upload_path'] = './assets/img/eo/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                    $config['max_size'] = 2048;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    
                    if (!empty($_FILES['filesiup']['name'])) {
                        if (!$this->upload->do_upload('filesiup')) {
                            echo 'File SIUP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filesiup'] = $upload['file_name'];
                        }
                    }
                    //bukti2
                    if (!empty($_FILES['filenpwp']['name'])) {
                        if (!$this->upload->do_upload('filenpwp')) {
                            echo 'File NPWP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenpwp'] = $upload['file_name'];
                        }
                    }
                    
                    $id = $this->input->post('id');
                    $this->m_data->updateEO($id,$insert);
                    redirect('E_eo');
                }
            else {
                $data['eo'] = $this->m_data->getEO();
		$this->load->view('v_eo',$data);
            }
        }
        
}
