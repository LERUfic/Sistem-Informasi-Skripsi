<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('skripsi');
		$this->load->library('session');
		$this->load->helper('url');
		$this->data = array();
		$this->login_data = $this->session->userdata('login_data');
		if(!isset($this->login_data) && $this->login_data == NULL && $this->login_data['role'] != 5){
			$this->data['title'] = "Access Denied";
			$this->data['msg'] = "Access Denied";
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
	}

	public function index()
	{
		//	
	}

	public function beranda()
	{
		$this->data['title'] = "Beranda Mahasiswa";
		$this->load->view('mhs/headermhs',$this->data);
		return $this->load->view('mhs/dashboardmhs',$this->data);
		
	}

	public function proposal()
	{
		$this->data['title'] = "Submit Proposal";
		$this->load->view('mhs/headermhs',$this->data);
		return $this->load->view('mhs/proposalmhs',$this->data);
	}
	
	private function _uploadTA()
	{
	    $config['upload_path']          = './uploads/';
	    $config['allowed_types']        = 'pdf';
	    $config['file_name']            = $this->login_data['nrp'];
	    $config['overwrite']			= true;
	    $config['max_size']             = 102400; // 10MB

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('draftTA')) {
	        return $this->upload->data("file_name");
	    }else{
	    	return print_r( $this->upload->display_errors());
	    }
	    
	}

	public function ajukan()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$flag = $this->skripsi->getProposal($this->login_data['nrp']);
			if(count($flag)==0){
				$path = $this->_uploadTA();
				$send_array = Array(
					'nrp' => $this->login_data['nrp'],
					'judul' => $this->input->post('judul'),
					'dosbing1' => $this->input->post('dosbing1'),
					'dosbing2' => $this->input->post('dosbing2'),
					'rmk' => $this->input->post('rmk'),
					'path' => $path
				);
				$ret = $this->skripsi->sendProposal($send_array);
			}
			else{
				$ret = "User Sudah Submit Proposal TA";
			}
			$this->data['title'] = "Result";
			$this->data['msg'] = $ret;
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
	}

	public function list()
	{
		$this->data['title'] = "List Proposal TA";
		$this->load->view('mhs/headermhs',$this->data);
		return $this->load->view('mhs/listTA',$this->data);
	}

	public function getListTA()
	{
		$list_data = $this->skripsi->getAllProposal();
		$draw = intval($this->input->get("draw"));

		$data = array();
          foreach($list_data as $r) {
               $data[] = array(
                    $r['nrp'],
                    $r['judul'],
                    $r['dosbing1'],
                    $r['dosbing2'],
                    $r['rmk']
               );
          }
		$start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
		$output = array(
			"draw" => $draw,
			"recordsTotal" => count($list_data),
		   	"recordsFiltered" => count($list_data),
		   	"data" => $data
		);
		echo json_encode($output);
		exit();
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */