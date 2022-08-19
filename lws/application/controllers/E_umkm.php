<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_umkm extends CI_Controller {

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
         * @author Enricochesa
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
            
                $data['komoditi']   = $this->m_data->getKomoditas();
                $data['umkm']       = $this->m_data->getUmkm();
                $data['kota']       = $this->m_data->getKota();
		$this->load->view('v_umkm',$data);
	}
        
         public function edit($id){
          $data['komoditi']     = $this->m_data->getKomoditas();
          $data['edit_umkm']    = $this->m_data->editUmkm($id);
          $data['umkm']         = $this->m_data->getUmkm();
          $this->load->view('edit_umkm',$data);
        }
        
         public function getKecamatan() {
            $id_kab = $this->input->post('kabupaten');
            $kecamatan = $this->m_data->get_kecamatan($id_kab);
            $data = "<option value=''>---Pilih Kecamatan---</option>";
                foreach ($kecamatan as $key) {
                    $data .= "<option value='$key[id]|$key[kec]'>$key[kec]</option>\n";
                }
                echo $data;
        }

    public function deleteUmkm(){
            $id = $this->input->post('id');
            $this->m_data->delete_umkm($id);
             redirect('E_umkm');
        }
        public function inputData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_umkm', 'nm_umkm', 'required');
            $kabupaten = $this->input->post('kabupaten');
            $kabupaten_explode = explode('|', $kabupaten);
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        
                        'jenis'         => $this->input->post('umkm'),
                        'nama'          => $this->input->post('nm_umkm'),
                        'alamat'        => $this->input->post('almt_umkm'),
                        
                        'kabkota'       => $kabupaten_explode[1],
                        'kelkec'        => $this->input->post('kecamatan'),
                        
                        'kode_pos'      => $this->input->post('kdpos_umkm'),
                        'no_telp'       => $this->input->post('no_umkm'),
                        'kd_hs2'        => $this->input->post('komoditas'),
                        'email'         => $this->input->post('email_umkm'),
                        
                        'contact_person'  => $this->input->post('cp'),
                        
                        'komoditi'      => $this->input->post('desc'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    
                    $config['upload_path'] = './assets/file_umkm/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls';
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
                    if (!empty($_FILES['filetdp']['name'])) {
                        if (!$this->upload->do_upload('filetdp')) {
                            echo 'File TDP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filetdp'] = $upload['file_name'];
                        }
                    }
                    
                    if (!empty($_FILES['filenib']['name'])) {
                        if (!$this->upload->do_upload('filenib')) {
                            echo 'File NIB<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenib'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filenohalal']['name'])) {
                        if (!$this->upload->do_upload('filenohalal')) {
                            echo 'File No. HALAL<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenohalal'] = $upload['file_name'];
                        }
                    }
                    
                    if (!empty($_FILES['filepirt']['name'])) {
                        if (!$this->upload->do_upload('filepirt')) {
                            echo 'File PIRT<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filepirt'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filesvlk']['name'])) {
                        if (!$this->upload->do_upload('filesvlk')) {
                            echo 'File SVLK<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filesvlk'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filemerk']['name'])) {
                        if (!$this->upload->do_upload('filemerk')) {
                            echo 'File MERK<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filemerk'] = $upload['file_name'];
                        }
                    }
                    
                    

                    $this->m_entri->dataUMKM($insert);
                    redirect('E_umkm');
                }
            else {
                $data['komoditi']    = $this->m_data->getKomoditas();
                  $data['umkm']       = $this->m_data->getUmkm();
                $this->load->view('v_umkm',$data);
            }
        }
        public function updateData(){
            $this->load->model('m_entri');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nm_umkm', 'nm_umkm', 'required');
                if ($this->form_validation->run() === TRUE) {

                    $insert = array(
                        
                        'jenis'         => $this->input->post('umkm'),
                        'nama'          => $this->input->post('nm_umkm'),
                        'alamat'        => $this->input->post('almt_umkm'),
                        'kelkec'       => $this->input->post('kel_umkm'),
                        'kabkota'      => $this->input->post('kota_umkm'),
                        
                        'kode_pos'      => $this->input->post('kdpos_umkm'),
                        'no_telp'       => $this->input->post('no_umkm'),
                        'kd_hs2'        => $this->input->post('komoditas'),
                        'email'      => $this->input->post('email_umkm'),
                        
                        'contact_person'       => $this->input->post('cp'),
                        
                        'komoditi'       => $this->input->post('desc'),
                        'created_at'    => date('Y-m-d H:i:s')
                              );
                    
                    $config['upload_path'] = './assets/file_umkm/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|xlsx|csv|xls';
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
                    if (!empty($_FILES['filetdp']['name'])) {
                        if (!$this->upload->do_upload('filetdp')) {
                            echo 'File TDP<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filetdp'] = $upload['file_name'];
                        }
                    }
                    
                    if (!empty($_FILES['filenib']['name'])) {
                        if (!$this->upload->do_upload('filenib')) {
                            echo 'File NIB<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenib'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filenohalal']['name'])) {
                        if (!$this->upload->do_upload('filenohalal')) {
                            echo 'File No. HALAL<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filenohalal'] = $upload['file_name'];
                        }
                    }
                    
                    if (!empty($_FILES['filepirt']['name'])) {
                        if (!$this->upload->do_upload('filepirt')) {
                            echo 'File PIRT<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filepirt'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filesvlk']['name'])) {
                        if (!$this->upload->do_upload('filesvlk')) {
                            echo 'File SVLK<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filesvlk'] = $upload['file_name'];
                        }
                    }
                    if (!empty($_FILES['filemerk']['name'])) {
                        if (!$this->upload->do_upload('filemerk')) {
                            echo 'File MERK<br>';
                            print_r($this->upload->display_errors());
                            die();
                        } else {
                            $upload = $this->upload->data();
                            $insert['filemerk'] = $upload['file_name'];
                        }
                    }
                    
                    $id = $this->input->post('id');

                    $this->m_data->updateUmkm($id,$insert);
                    redirect('E_umkm');
                }
            else {
                $data['komoditi']    = $this->m_data->getKomoditas();
                  $data['umkm']       = $this->m_data->getUmkm();
                $this->load->view('v_umkm',$data);
            }
        }
        public function ajax_get_desc() {
        $hs = $this->input->post('hs');
        $result = $this->m_data->getDescHs($hs);
        echo json_encode($result);
    }
        
}
