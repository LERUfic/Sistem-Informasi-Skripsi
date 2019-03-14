<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	private $login_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('skripsi');
		$this->load->library('session');
		$this->load->helper('url');
		$this->data = array();
		$this->login_data = $this->session->userdata('login_data');
	}

	public function index()
	{
		if(!isset($this->login_data) && $this->login_data == NULL){
			return redirect(base_url('user/login'));
		}
		else{
			$this->data['login_data'] = $this->session->userdata('login_data');
			if($this->login_data['role']==3){
				return redirect(base_url('verifikator/beranda'));
			}
			$this->data['login_data'] = $this->session->userdata('login_data');
			if($this->login_data['role']==4){
				return redirect(base_url('dosen/beranda'));
			}
			if($this->login_data['role']==5){
				return redirect(base_url('mahasiswa/beranda'));
			}
		}
		
	}

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */