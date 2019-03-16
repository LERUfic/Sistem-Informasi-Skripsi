<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi extends CI_Controller {

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
		if($this->login_data['role'] != 2){
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
		$this->load->view('kaprodi/headerkaprodi',$this->data);
		return $this->load->view('kaprodi/dashboardkaprodi',$this->data);
	}

	public function list()
	{
		$this->data['title'] = "List Proposal TA";
		$this->load->view('kaprodi/headerkaprodi',$this->data);
		return $this->load->view('kaprodi/listTA',$this->data);
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
			$myRole = $this->login_data['role'];
			if($current_status == 14){
				if($myRole == 2){
					$perubahan = '15';
				}
			}
		}

		if($current_status == 14 && $perubahan=='15'){
			$send_array = Array(
				'idstat' => $perubahan
			);
			$ret = $this->skripsi->updateProposal($this->input->post('nrp'),$send_array);
		}
	}

	/* Seminar Controller */
	public function jadwal(){
		$this->data['title'] = "List Jadwal Seminar TA";
		$this->load->view('kaprodi/headerkaprodi',$this->data);
		return $this->load->view('kaprodi/listSeminar',$this->data);
	}
	
	public function getListSeminar()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
          	$list_seminar = $this->skripsi->getAllSeminar();
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
			$data = $this->skripsi->getSeminar($this->input->post('nrp'));
			$current_status = $data[0]['idstat'];
			$myRole = $this->login_data['role'];
			if($current_status == 23){
				if($myRole == 2){
					$perubahan = '24';
				}
			}
		}

		if($current_status == 23 && $perubahan=='24'){
			$send_array = Array(
				'idstat' => $perubahan
			);
			$ret = $this->skripsi->updateSeminar($this->input->post('nrp'),$send_array);
		}

		if($ret=="Berhasil Update Seminar"){
			$send_array2 = Array(
				'idstat' => 30
			);
			$res = $this->skripsi->updateProposal($this->input->post('nrp'),$send_array2);
		}
	}
}

/* End of file Kaprodi.php */
/* Location: ./application/controllers/Kaprodi.php */