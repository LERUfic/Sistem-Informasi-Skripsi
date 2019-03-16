<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikator extends CI_Controller {

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
		if($this->login_data['role'] != 3){
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
		$this->data['title'] = "Beranda Dosen";
		$this->load->view('vrmk/headervrmk',$this->data);
		return $this->load->view('vrmk/dashboardvrmk',$this->data);
	}

	public function list()
	{
		$this->data['title'] = "List Proposal TA";
		$this->load->view('vrmk/headervrmk',$this->data);
		return $this->load->view('vrmk/listTA',$this->data);
	}

	public function getListTA()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$myRMK = $this->skripsi->getRMKByNRP($this->login_data['nrp']);
			$list_data = Array();
			for($i=0;$i<count($myRMK);$i++){
				$temp = $this->skripsi->getProposalByRMK($myRMK[$i]['idrmk']);
				if(count($temp)==1){
					array_push($list_data,$temp[0]);
				}
			}
			$draw = intval($this->input->get("draw"));

			$data = array();
	          foreach($list_data as $r) {
	               $data[] = array(
	                    $r['nrp'],
	                    $r['judul'],
	                    $r['dosbing1_nama'],
	                    $r['dosbing2_nama'],
	                    $r['lrmk'],
	                    $r['textstat'],
	                    $r['path']
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

	public function ubahStatusTA(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$data = $this->skripsi->getProposal($this->input->post('nrp'));
			$current_status = $data[0]['idstat'];
			$myRole = $this->login_data['role'];
			$myRMK = $this->skripsi->getRMKByNRP($this->login_data['nrp']);
			$flag = 0;
			for($i=0;$i<count($myRMK);$i++){
				if($data[0]['rmk'] == $myRMK[$i]['idrmk']){
					$flag = 1;
					break;
				}
			}
			if($flag){
				if($current_status == 13){
					if($myRole == 3){
						$perubahan = '14';
					}
				}
				if($current_status == 30){
					if($myRole == 3){
						$perubahan = '31';
					}
				}
			}

			if($current_status == 13 || $current_status == 30){
				$send_array = Array(
					'idstat' => $perubahan
				);
				$ret = $this->skripsi->updateProposal($this->input->post('nrp'),$send_array);
			}
		}
	}

}

/* End of file Verifikator.php */
/* Location: ./application/controllers/Verifikator.php */