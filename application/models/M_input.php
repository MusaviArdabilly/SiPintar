<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    function login($nip, $password) {
        $this->db->where('nip', $nip);
        $this->db->where('password', md5($password));
        $result = $this->db->get('user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    
    public function insertUser($data) {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    
    public function insertAgenda($data) {
        $this->db->insert('agenda_ln_dn', $data);
        return $this->db->insert_id();
    }
    public function insertUmkmAgenda($data) {
        $this->db->insert('agenda_umkm_ln_dn', $data);
        return $this->db->insert_id();
    }
    //================EKSPOR==============//
    public function insertSektorMigas($data) {
        $this->db->insert('t_ekspor_migas', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertSektor($data) {
        $this->db->insert('t_ekspor_sektor', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertKomoditiEkspor($data) {
        $this->db->insert('t_ekspor_komoditi', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertNegaraEkspor($data) {
        $this->db->insert('t_ekspor_negara', $data);
        return $this->db->insert_id(); 
    }
     //================END EKSPOR==============//
    
    //====================IMPOR===============//
    public function insertSektorMigasI($data) {
        $this->db->insert('t_impor_migas', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertSektorI($data) {
        $this->db->insert('t_impor_sektor', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertKomoditiImpor($data) {
        $this->db->insert('t_impor_komoditi', $data);
        return $this->db->insert_id(); 
    }
    
    public function insertNegaraImpor($data) {
        $this->db->insert('t_impor_negara', $data);
        return $this->db->insert_id(); 
    }
     //================END IMPOR==============//
}
