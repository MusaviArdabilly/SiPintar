<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
         * author : enricochesa
         * 
	 */
    
        public function __construct() {
            parent::__construct();
            $this->load->model(array('m_data'));
                    if (!$this->session->userdata('logged_in')) {
                            redirect('login');
                    }
        }
	public function index()
	{       
                $data['user'] = $this->m_data->getUser();
		$this->load->view('user',$data);
	}
        
         public function edit($id){
          $data['user'] = $this->m_data->getUser();
          $data['edit_user']    = $this->m_data->editUser($id);
          $this->load->view('edit_user',$data);
        }
        
        public function deleteUser(){
            $id = $this->input->post('id');
            $this->m_data->delete_user($id);
             redirect('User');
        }
        
        public function inputUser(){
            $this->load->model('m_input');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_user', 'nm_user', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'user_login'        => $this->input->post('nm_user'),
                        'user_pass'         => md5($this->input->post('pass')),
                        'user_email'        => $this->input->post('email'),
                        'user_role'         => $this->input->post('role')
                              );

                    $this->m_input->insertUser($insert);
                    redirect('User');
                }
            else {
                $this->load->view('User');
            }
        }
        public function updateUser(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_user', 'nm_user', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'user_login'        => $this->input->post('nm_user'),
                        'user_pass'         => md5($this->input->post('pass')),
                        'user_email'        => $this->input->post('email'),
                        'user_role'         => $this->input->post('role')
                              );
                    $id = $this->input->post('id');
                    $this->m_data->updateUser($id,$insert);
                    redirect('User');
                }
            else {
                $data['user'] = $this->m_data->getUser();
		$this->load->view('user',$data);
            }
        }
}
        
