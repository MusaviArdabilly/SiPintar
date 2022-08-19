<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     * 
     * @author Enricochesa
     */
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in')) {
            redirect('Home_admin');
        }
        $this->load->model(array('M_data'));
    }

    public function index() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            
         $login =  $this->M_data->login($email, $password);
        
            if ($login) {
                $array = array(
                    'id' => $login->id,
                    'user_login' => $login->user_login,
                    'user_email' => $login->user_email,
                    'user_role' => $login->user_role,
                    'user_pass' => $login->user_pass,
                    'logged_in' => true,
                 
                );
                $this->session->set_userdata($array);
                
                $nama = $this->session->userdata('user_login');
                $email = $this->session->userdata('user_email');
                $role = $this->session->userdata('user_role');
              
//                $id = $this->M_input_pkc->log_login($email,$nama,$level);
                $id = $this->M_data->log_login($nama,$role,$email);
                $array = array(
                    'id_login' => $id
                );
                
                $this->session->sess_expiration = '10';
                $this->session->sess_expire_on_close = FALSE;
                $this->session->set_userdata($array);

                redirect('Home_admin');
            } else {
                $this->load->view('login');
            }
            
        }
    }

}
