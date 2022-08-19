<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

   public function __construct() {
        parent::__construct();
        $this->load->model(array('M_data'));
    }
  
    public function index() {
        $id = $this->session->userdata('id_login');
        $this->M_data->log_logout($id);
        
        $this->session->sess_destroy();
        redirect('Home');
    }
}
