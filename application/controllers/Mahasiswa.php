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
		if(!isset($this->login_data) && $this->login_data == NULL){
			$this->data['title'] = "Access Denied";
			$this->data['msg'] = "Access Denied";
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
		if($this->login_data['role'] != 5){
			$this->data['title'] = "Access Denied";
			$this->data['msg'] = "Access Denied";
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
	}

	public function index()
	{
		$this->data['title'] = "Redirect";
		$this->data['msg'] = "Dialihkan ke Beranda";
		$this->data['rdr'] = "beranda";
		return $this->load->view('status',$this->data);
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

	public function edit()
	{
		$this->data['proposal'] = $this->skripsi->getProposal($this->login_data['nrp']);
		if(count($this->data['proposal'])==0){
			$this->data['title'] = "Error";
			$this->data['msg'] = "Mahasiswa Belum Upload Proposal";
			$this->data['rdr'] = "mahasiswa/proposal";
			return $this->load->view('status',$this->data);
		}
		$this->data['title'] = "Edit Proposal";
		$this->load->view('mhs/headermhs',$this->data);
		return $this->load->view('mhs/editProposalmhs',$this->data);
	}

	public function ubah()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$flag = $this->skripsi->getProposal($this->login_data['nrp']);
			if(count($flag)==1){
				if($flag[0]['idstat'] == 10 || $flag[0]['idstat'] == 11 || $flag[0]['idstat'] == 12){
					if (empty($_FILES['draftTA']['name'])) {
						$path = $flag[0]['path'];
					}
					else{
						$path = $this->_uploadTA();	
					}
					
					$send_array = Array(
						'judul' => $this->input->post('judul'),
						'dosbing1' => $this->input->post('dosbing1'),
						'dosbing2' => $this->input->post('dosbing2'),
						'rmk' => $this->input->post('rmk'),
						'idstat' => $flag[0]['idstat'],
						'path' => $path
					);
					$ret = $this->skripsi->updateProposal($this->login_data['nrp'],$send_array);	
				}
				else{
					$this->data['title'] = "Error";
					$this->data['msg'] = "Tidak Bisa Dirubah! Proposal Sudah Disetujui.";
					$this->data['rdr'] = "beranda";
					return $this->load->view('status',$this->data);		
				}
				
			}
			else{
				$ret = "Belum Submit Proposal";
			}
			$this->data['title'] = "Result";
			$this->data['msg'] = $ret;
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
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
					'path' => $path,
					'idstat' => '10'
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
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$list_data = $this->skripsi->getAllProposal();
			$draw = intval($this->input->get("draw"));

			$data = array();
	          foreach($list_data as $r) {
	               $data[] = array(
	                    $r['nrp'],
	                    $r['judul'],
	                    $r['dosbing1_nama'],
	                    $r['dosbing2_nama'],
	                    $r['lrmk']
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
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Access Denied";
			$this->data['msg'] = "Access Denied";
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
	}

	public function info()
	{
		$this->data['proposal'] = $this->skripsi->getProposal($this->login_data['nrp']);
		if(count($this->data['proposal'])==0){
			$this->data['title'] = "Error";
			$this->data['msg'] = "Mahasiswa Belum Upload Proposal";
			$this->data['rdr'] = "mahasiswa/proposal";
			return $this->load->view('status',$this->data);
		}
		$this->data['title'] = "Info Proposal TA";
		$this->load->view('mhs/headermhs',$this->data);
		return $this->load->view('mhs/infoProposalmhs',$this->data);
	}

	/* SEMINAR Controller*/
	public function seminar()
	{
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Submit Jadwal Seminar";
			$this->load->view('mhs/headermhs',$this->data);
			return $this->load->view('mhs/seminarmhs',$this->data);
		}
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$flag1 = $this->skripsi->getProposal($this->login_data['nrp']);
			$flag2 = $this->skripsi->getSeminar($this->login_data['nrp']);
			if(count($flag1)==1){
				if($flag1[0]['idstat']==15){
					if(count($flag2)==0){
						$send_array = Array(
							'nrp' => $this->login_data['nrp'],
							'tema' => $this->input->post('tema'),
							'd_mulai' => $this->input->post('d_mulai'),
							'd_selesai' => $this->input->post('d_selesai'),
							'idstat' => '20',
							'tempat' => $this->input->post('tempat')
						);
						$res = $this->skripsi->sendSeminar($send_array);

						if($res){
							$send_array2 = Array(
								'idstat' => '16'
							);
							$ret = $this->skripsi->updateProposal($flag1[0]['nrp'],$send_array2);
							if($ret == "Berhasil Update Proposal"){
								$ret = "Berhasil Insert Jadwal Seminar";
							}
							else{
								$ret = "Gagal Update Status Proposal";	
							}
						}
						else{
							$ret = "Gagal Melakukan Insert";
						}
					}
					else{
						$ret = "User Sudah Submit Jadwal Seminar TA";
					}
				}
				else{
					$ret = "User Belum Mendapat Persetujuan Kedua Dosen Pembimbing";
				}
			}
			else{
				$ret = "User Belum Submit Proposal TA";
			}
			$this->data['title'] = "Result";
			$this->data['msg'] = $ret;
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}
	}
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */