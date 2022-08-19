<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class I_agenda extends CI_Controller {

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
     */
//        public function __construct() {
//            parent::__construct();
//            $this->load->model(array('m_input'));
//            //        if (!$this->session->userdata('logged_in')) {
//                //            redirect('login');
//            //        }
//        }
    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_data'));
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $data['agendanull']         = $this->m_data->getAgendaNull();
        $data['agendanullsdh']      = $this->m_data->getAgendaNullsdh();
        $data['agendanulldetail']   = $this->m_data->getAgendaNulldetail();
        $data['nama']               = $this->m_data->getNamaEO();
        $data['nama_pl']            = $this->m_data->getNamaPL();
        $this->load->view('i_agenda', $data);
    }

    public function LN() {
        $data['agendanull']         = $this->m_data->getAgendaNullLN();
        $data['agendanullsdh']      = $this->m_data->getAgendaNullLNsdh();
        $data['agendanulldetail']   = $this->m_data->getAgendaNulldetail();
        $data['nama']               = $this->m_data->getNamaEO();
        $data['nama_pl']            = $this->m_data->getNamaPL();
        $this->load->view('i_agenda_luar', $data);
    }

    public function show() {
        $data['agendanull']         = $this->m_data->getAgendaNull();
        $data['agendanullsdh']      = $this->m_data->getAgendaNullsdh();
        $data['agendanulldetail']   = $this->m_data->getAgendaNulldetail();
        $this->load->view('i_agenda_show', $data);
    }

    public function showLN() {
        $data['agendanull']         = $this->m_data->getAgendaNullLN();
        $data['agendanullsdh']      = $this->m_data->getAgendaNullLNsdh();
        $data['agendanulldetail']   = $this->m_data->getAgendaNulldetail();
        $this->load->view('i_agenda_luar_show', $data);
    }

    public function inputAgenda() {
        $this->load->model('m_input');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nm_agenda', 'nm_agenda', 'required');
        if ($this->form_validation->run() === TRUE) {

            $insert = array(
                'nama_agenda'   => $this->input->post('nm_agenda'),
                'tgl_mulai'     => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
                'tgl_selesai'   => date_format(date_create($this->input->post('tgl_selesai')), 'Y-m-d'),
                'nama_kota'     => $this->input->post('nm_kota'),
                'lokasi_agenda' => $this->input->post('lksi_agenda'),
                'nama_eo'   => $this->input->post('eo'),
//                'nama_pl'   => $this->input->post('penyelenggara'),
                'diikuti'   => $this->input->post('ikut'),
                'dalam-luar-negri' => "DALAM NEGERI"
            );
            
            
            
            
            
            
            
            $config['upload_path'] = './assets/img/agenda/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!empty($_FILES['suratpenawaran']['name'])) {
                if (!$this->upload->do_upload('suratpenawaran')) {
                    echo 'File Surat Penawaran<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['suratpenawaran'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['brosur']['name'])) {
                if (!$this->upload->do_upload('brosur')) {
                    echo 'File Brosur<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['brosur'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['foto_lokasi']['name'])) {
                if (!$this->upload->do_upload('foto_lokasi')) {
                    echo 'File Foto Lokasi<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['foto_lokasi'] = $upload['file_name'];
                }
            }

            $this->m_input->insertAgenda($insert);
            redirect('I_agenda');
        } else {
            $this->load->view('I_agenda');
        }
    }

    public function inputAgendaLuar() {
        $this->load->model('m_input');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nm_agenda', 'nm_agenda', 'required');
        if ($this->form_validation->run() === TRUE) {

            $insert = array(
                'nama_agenda' => $this->input->post('nm_agenda'),
                'tgl_mulai' => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
                'tgl_selesai' => date_format(date_create($this->input->post('tgl_selesai')), 'Y-m-d'),
                'nama_kota' => $this->input->post('nm_kota'),
                'lokasi_agenda' => $this->input->post('lksi_agenda'),
                'nama_eo'   => $this->input->post('eo'),
//                'nama_pl'   => $this->input->post('penyelenggara'),
                'diikuti'   => $this->input->post('ikut'),
                'dalam-luar-negri' => "LUAR NEGERI"
            );
            $config['upload_path'] = './assets/img/agenda_ln/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!empty($_FILES['suratpenawaran']['name'])) {
                if (!$this->upload->do_upload('suratpenawaran')) {
                    echo 'File Surat Penawaran<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['suratpenawaran'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['brosur']['name'])) {
                if (!$this->upload->do_upload('brosur')) {
                    echo 'File Brosur<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['brosur'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['foto_lokasi']['name'])) {
                if (!$this->upload->do_upload('foto_lokasi')) {
                    echo 'File Foto Lokasi<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $insert['foto_lokasi'] = $upload['file_name'];
                }
            }

            $this->m_input->insertAgenda($insert);
            redirect('I_agenda/LN');
        } else {
            $this->load->view('I_agenda_luar');
        }
    }

    public function agendaUmkm() {
          $this->load->model('m_input');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('umkm', 'umkm', 'required');

        if ($this->form_validation->run() === TRUE) {
            
            $countbrg = $this->input->post('jumlah_add_umkm');
            for ($i = 0; $i < $countbrg; $i++) {
               $id_agenda = $this->input->post('id_agenda');
                if ($i == 0) {
                    $aumkm = $this->input->post('umkm');
                    $aid_umkm = explode('|', $aumkm);
                    
                    
                    
                    $id_umkm[$i]    = $aid_umkm[0];
                    $umkm[$i]       = $aid_umkm[1];
                    
                    
                    
                } else {
                    
                    $aumkm = $this->input->post('umkm_' . ($i + 1));
                    $aid_umkm = explode('|', $aumkm);

                    $id_umkm[$i]    = $aid_umkm[0];
                    $umkm[$i]       = $aid_umkm[1];
                }
                
                $databrg = array(
                    'umkm'      => $umkm[$i],
                    'id_umkm'   => $id_umkm[$i],
                    'id_agenda' => $id_agenda
                );
                  $this->m_input->insertUmkmAgenda($databrg);
                  
            } redirect('I_agenda');
        } else {
            echo "error";
        }
    }

    public function deleteAgendaDN() {
        $id = $this->input->post('id');
        $this->m_data->delete_agenda_dn($id);
        redirect('I_agenda');
    }

    public function deleteAgendaLN() {
        $id = $this->input->post('id');
        $this->m_data->delete_agenda_ln($id);
        redirect('I_agenda/LN');
    }

    public function addUmkm($id) {
        $data['umkm'] = $this->m_data->getUmkm($id);
        $data['agenda'] = $this->m_data->editAgenda($id);
        $this->load->view('add_umkm', $data);
    }
    
    public function addUmkmLN($id) {
        $data['umkm'] = $this->m_data->getUmkm($id);
        $data['agenda'] = $this->m_data->editAgendaLN($id);
        $this->load->view('add_umkm_ln', $data);
    }

    public function edit($id) {
        $data['agenda'] = $this->m_data->editAgenda($id);
        $this->load->view('edit_agenda', $data);
    }

    public function editLN($id) {
        $data['agenda'] = $this->m_data->editAgendaLN($id);
        $this->load->view('edit_agenda_luar', $data);
    }

    public function updateAgenda() {
        $this->load->model('m_data');
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nm_agenda', 'nm_agenda', 'required');
        if ($this->form_validation->run() === TRUE) {

            $update = array(
                'nama_agenda'   => $this->input->post('nm_agenda'),
                'tgl_mulai'     => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
                'tgl_selesai'   => date_format(date_create($this->input->post('tgl_selesai')), 'Y-m-d'),
                'nama_kota'     => $this->input->post('nm_kota'),
                'lokasi_agenda' => $this->input->post('lksi_agenda'),
                'diikuti'       => $this->input->post('ikut'),
                'dalam-luar-negri' => "DALAM NEGERI"
            );
            $config['upload_path'] = './assets/img/agenda/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!empty($_FILES['suratpenawaran']['name'])) {
                if (!$this->upload->do_upload('suratpenawaran')) {
                    echo 'File Surat Penawaran<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['suratpenawaran'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['brosur']['name'])) {
                if (!$this->upload->do_upload('brosur')) {
                    echo 'File Brosur<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['brosur'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['foto_lokasi']['name'])) {
                if (!$this->upload->do_upload('foto_lokasi')) {
                    echo 'File Foto Lokasi<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['foto_lokasi'] = $upload['file_name'];
                }
            }

            $this->m_data->updateAgenda($id, $update);
            redirect('I_agenda');
        } else {
            $data['agendanull'] = $this->m_data->getAgendaNull();
            $this->load->view('I_agenda', $data);
        }
    }

    public function updateAgendaLN() {
        $this->load->model('m_data');
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nm_agenda', 'nm_agenda', 'required');
        if ($this->form_validation->run() === TRUE) {

            $update = array(
                
                'nama_agenda'   => $this->input->post('nm_agenda'),
                'tgl_mulai'     => date_format(date_create($this->input->post('tgl_mulai')), 'Y-m-d'),
                'tgl_selesai'   => date_format(date_create($this->input->post('tgl_selesai')), 'Y-m-d'),
                'nama_kota'     => $this->input->post('nm_kota'),
                'lokasi_agenda' => $this->input->post('lksi_agenda'),
                'diikuti'       => $this->input->post('ikut'),
                'dalam-luar-negri' => "LUAR NEGERI"
            );
            $config['upload_path'] = './assets/img/agenda_ln/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if (!empty($_FILES['suratpenawaran']['name'])) {
                if (!$this->upload->do_upload('suratpenawaran')) {
                    echo 'File Surat Penawaran<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['suratpenawaran'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['brosur']['name'])) {
                if (!$this->upload->do_upload('brosur')) {
                    echo 'File Brosur<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['brosur'] = $upload['file_name'];
                }
            }
            if (!empty($_FILES['foto_lokasi']['name'])) {
                if (!$this->upload->do_upload('foto_lokasi')) {
                    echo 'File Foto Lokasi<br>';
                    print_r($this->upload->display_errors());
                    die();
                } else {
                    $upload = $this->upload->data();
                    $update['foto_lokasi'] = $upload['file_name'];
                }
            }
            $this->m_data->updateAgendaLN($id,$update);
            redirect('I_agenda/LN');
        } else {
            $data['agendanull'] = $this->m_data->getAgendaNullLN();
            $this->load->view('i_agenda_luar', $data);
        }
    }

}
