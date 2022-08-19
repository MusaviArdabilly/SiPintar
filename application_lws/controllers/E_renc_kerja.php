<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_renc_kerja extends CI_Controller {

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
                $data['renc_kerja'] = $this->m_data->getRencKerja();
		$this->load->view('v_renc_kerja',$data);
	}
        
        public function show()
	{
                $data['renc_kerja'] = $this->m_data->getRencKerja();
		$this->load->view('v_renc_kerja_show',$data);
	}
        public function showhasil()
	{
                $data['renc_kerja'] = $this->m_data->getRencKerja();
		$this->load->view('v_renc_kerja_show_hasil',$data);
	}
        
        public function inputData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('renc_kerja', 'renc_kerja', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'rencana_agenda'   => $this->input->post('renc_kerja'),
                        'realisasi_agenda' => $this->input->post('realisasi_kerja'),
                        
                        'tgl_agenda'       => date_format(date_create($this->input->post('tglagenda_kerja')), 'Y-m-d'),
                        'tgl_mulai'        => date_format(date_create($this->input->post('tglmulai_kerja')), 'Y-m-d'),
                        'tgl_akhir'        => date_format(date_create($this->input->post('tglakhir_kerja')), 'Y-m-d'),
                        'hasil_agenda'     => $this->input->post('hsil_kerja'),
                        'keterangan'       => $this->input->post('ket_kerja'),
                        'created_at'       => date('Y-m-d H:i:s')
                         );
                    $config['upload_path'] = './assets/file_renc_kerja/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                    $config['max_size'] = 2048;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    
                    if (!empty($_FILES['filefoto']['name'])) {
                        if (!$this->upload->do_upload('filefoto')) {
                            echo 'File FOTO<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filefoto'] = $upload['file_name'];
                        }
                    }
                    //bukti2
                    if (!empty($_FILES['filelaporan']['name'])) {
                        if (!$this->upload->do_upload('filelaporan')) {
                            echo 'File LAPORAN<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filelaporan'] = $upload['file_name'];
                        }
                    }
                    $this->m_entri->dataRencKerja($insert);
                    redirect('E_renc_kerja');
                }
            else {
                $data['renc_kerja'] = $this->m_data->getRencKerja();
		$this->load->view('v_renc_kerja',$data);
            }
        }
        
        public function updateData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('renc_kerja', 'renc_kerja', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        'rencana_agenda'   => $this->input->post('renc_kerja'),
                        'realisasi_agenda' => $this->input->post('realisasi_kerja'),
                        
                        'tgl_agenda'       => date_format(date_create($this->input->post('tglagenda_kerja')), 'Y-m-d'),
                        'tgl_mulai'        => date_format(date_create($this->input->post('tglmulai_kerja')), 'Y-m-d'),
                        'tgl_akhir'        => date_format(date_create($this->input->post('tglakhir_kerja')), 'Y-m-d'),
                        'hasil_agenda'     => $this->input->post('hsil_kerja'),
                        'keterangan'       => $this->input->post('ket_kerja'),
                        'created_at'       => date('Y-m-d H:i:s')
                         );
                    $config['upload_path'] = './assets/file_renc_kerja/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                    $config['max_size'] = 2048;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    
                    if (!empty($_FILES['filefoto']['name'])) {
                        if (!$this->upload->do_upload('filefoto')) {
                            echo 'File FOTO<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filefoto'] = $upload['file_name'];
                        }
                    }
                    //bukti2
                    if (!empty($_FILES['filelaporan']['name'])) {
                        if (!$this->upload->do_upload('filelaporan')) {
                            echo 'File LAPORAN<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filelaporan'] = $upload['file_name'];
                        }
                    }
                    $id = $this->input->post('id');
                    $this->m_data->updateRencKerja($id,$insert);
                    redirect('E_renc_kerja');
                }
            else {
              $data['renc_kerja'] = $this->m_data->getRencKerja();
		$this->load->view('v_renc_kerja',$data);
            }
        }
        public function edit($id){
          $data['renc_kerja'] = $this->m_data->getRencKerja();
          $data['edit_renc_kerja'] = $this->m_data->editRencKerja($id);
          $this->load->view('edit_renc_kerja',$data);
        }
        
        public function deleteRencKerja(){
            $id = $this->input->post('id');
            $this->m_data->delete_renc_kerja($id);
             redirect('E_renc_kerja');
        }
}
