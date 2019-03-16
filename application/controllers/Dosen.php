<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

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
		if($this->login_data['role'] != 4){
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
		$this->load->view('dsn/headerdsn',$this->data);
		return $this->load->view('dsn/dashboarddsn',$this->data);
	}

	public function list()
	{
		$this->data['title'] = "List Proposal TA";
		$this->load->view('dsn/headerdsn',$this->data);
		return $this->load->view('dsn/listTA',$this->data);
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
			$myID = $this->login_data['nrp'];

			if($current_status == 10){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = '11';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = '12';
				}
				else{
					$perubahan = 'TETAP';
				}
			}
			elseif($current_status == 11){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = 'TETAP';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = '13';
				}
				else{
					$perubahan = 'TETAP';
				}	
			}
			elseif($current_status == 12){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = '13';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = 'TETAP';
				}
				else{
					$perubahan = 'TETAP';
				}	
			}
			else{
				$perubahan = 'TETAP';
			}

			if($perubahan!='TETAP'){
				$send_array = Array(
					'idstat' => $perubahan
				);
				$ret = $this->skripsi->updateProposal($this->input->post('nrp'),$send_array);
			}
		}
	}

	/* Seminar Controller */
	public function jadwal()
	{
		$this->data['title'] = "List Jadwal Seminar TA";
		$this->load->view('dsn/headerdsn',$this->data);
		return $this->load->view('dsn/listSeminar',$this->data);
	}

	public function getListSeminar()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$list_data = $this->skripsi->getAllProposalByDosbing($this->login_data['nrp']);

			$data = array();
        	foreach($list_data as $r) {
            	array_push($data,$r['nrp']);
          	}
          	$list_seminar = $this->skripsi->getSeminarByNRP($data);
			$xdata = array();
			foreach($list_seminar as $r) {
			   	$xdata[] = array(
			        $r['nrp'],
			        $r['tema'],
			        $r['d_mulai'],
			        $r['d_selesai'],
			        $r['tempat'],
			        $r['textstat']
			   	);
			}
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
	        $length = intval($this->input->get("length"));
			$output = array(
				"draw" => $draw,
				"recordsTotal" => count($list_seminar),
			   	"recordsFiltered" => count($list_seminar),
			   	"data" => $xdata
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

	public function ubahStatusSeminar(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$data = $this->skripsi->getProposal($this->input->post('nrp'));
			$xdata = $this->skripsi->getSeminar($this->input->post('nrp'));

			$current_status = $xdata[0]['idstat'];
			$myID = $this->login_data['nrp'];

			if($current_status == 20){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = '21';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = '22';
				}
				else{
					$perubahan = 'TETAP';
				}
			}
			elseif($current_status == 21){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = 'TETAP';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = '23';
				}
				else{
					$perubahan = 'TETAP';
				}	
			}
			elseif($current_status == 22){
				if($myID == $data[0]['dosbing1_nrp']){
					$perubahan = '23';
				}
				elseif($myID == $data[0]['dosbing2_nrp']){
					$perubahan = 'TETAP';
				}
				else{
					$perubahan = 'TETAP';
				}	
			}
			else{
				$perubahan = 'TETAP';
			}

			if($perubahan!='TETAP'){
				$send_array = Array(
					'idstat' => $perubahan
				);
				$ret = $this->skripsi->updateSeminar($this->input->post('nrp'),$send_array);
			}
		}
	}

}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */