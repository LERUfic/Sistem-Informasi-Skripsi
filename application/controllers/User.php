<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $login_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('skripsi');
		$this->load->library('session');
		$this->load->helper('url');
		$this->data = array();

		
		$this->login_data = $this->session->userdata('login_data');
		$this->data['login_data'] = $this->session->userdata('login_data');
	}

	public function daftar()
	{
		//Method POST
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			//Insert user dahulu
			$send_array = array(
				'nrp' => $this->input->post('nrp'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'pass' => md5($this->input->post('pass')),
				'role' => $this->input->post('role')
			);
			$res = $this->skripsi->createUser($send_array);

			//Insert rmk untuk dosen dan verifikator RMK
			if($this->input->post('role') == 3 || $this->input->post('role') == 4){
				foreach($this->input->post('rmk') as $val){
					$rmk_array = array(
						'idrmk' => $val,
						'iduser' => $this->input->post('nrp')
					);
					$ret = $this->skripsi->insertRMK($rmk_array);
				}
			}

			//Insert rmk untuk administrator dan kepala prodi 
			if($this->input->post('role') == 1 || $this->input->post('role') == 2){
				$listrmk = $this->skripsi->getRMK();
				$endrmk = count($listrmk);
				for($i=1;$i<=$endrmk;++$i){
					$rmk_array = array(
						'idrmk' => $i,
						'iduser' => $this->input->post('nrp')
					);
					$ret = $this->skripsi->insertRMK($rmk_array);
				}
			}
			//View result
			$this->data['title'] = "Result";
			$this->data['msg'] = $res;
			$this->data['rdr'] = "user/login";
			return $this->load->view('status',$this->data);
			// return redirect(site_url('user/login'));
		}

		//Method GET
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Log In";
			return $this->load->view('formuser',$this->data);
		}
	}

	public function login()
	{
		//Throw user to Beranda if already login
		if(isset($this->login_data) && $this->login_data != NULL){
			$this->data['title'] = "Result";
			$this->data['msg'] = "Anda Sudah Login";
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}

		//Method POST
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			//Request login
			$send_array = array(
				'nrp' => $this->input->post('nrp'),
				'pass' => md5($this->input->post('pass'))
			);
			$res = $this->skripsi->loginUser($send_array);

			//View result
			$this->data['title'] = "Result";
			$this->data['msg'] = $res;
			$this->data['rdr'] = "beranda";
			return $this->load->view('status',$this->data);
		}

		//Method GET
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Log In";
			return $this->load->view('formlogin',$this->data);
		}
	}

	public function logout()
	{
		//Only login user only that can logout
		if(isset($this->login_data) && $this->login_data != NULL){
			//Remove session
			$this->session->unset_userdata('login_data');
			$this->data['title'] = "Result";
			$this->data['msg'] = "Logout Berhasil";
			$this->data['rdr'] = "user/login";
			return $this->load->view('status',$this->data);
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
