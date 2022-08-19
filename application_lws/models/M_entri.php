<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_entri extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function dataUMKM($insert) {
        $this->db->insert('mst_umkm', $insert);
        return $this->db->insert_id();
    }
    
    public function dataEO($insert) {
        $this->db->insert('mst_event_organiser', $insert);
        return $this->db->insert_id();
    }
    public function dataPL($insert) {
        $this->db->insert('mst_penyelenggara', $insert);
        return $this->db->insert_id();
    }
     public function analisa($insert) {
        $this->db->insert('analisa', $insert);
        return $this->db->insert_id();
    }
    public function dataRencKerja($insert) {
        $this->db->insert('mst_rencana_kerja', $insert);
        return $this->db->insert_id();
    }
}
