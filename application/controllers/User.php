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
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$send_array = array(
				'nrp' => $this->input->post('nrp'),
				'email' => $this->input->post('email'),
				'pass' => md5($this->input->post('pass')),
				'role' => $this->input->post('role')
			);

			$res = $this->skripsi->createUser($send_array);
			//echo $res;
			return redirect(site_url('user/login'));
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Log In";
			return $this->load->view('formuser',$this->data);
		}
	}

	public function login()
	{
		if(isset($this->login_data) && $this->login_data != NULL){
			echo "Anda Sudah Login";
			return;
		}
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$send_array = array(
				'nrp' => $this->input->post('nrp'),
				'pass' => md5($this->input->post('pass'))
			);
			$res = $this->skripsi->loginUser($send_array);
			echo $res;
			return;
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET'){
			$this->data['title'] = "Log In";
			return $this->load->view('formlogin',$this->data);
		}
	}

	public function logout()
	{
		if(isset($this->login_data) && $this->login_data != NULL){
			$this->session->unset_userdata('login_data');
			echo "Logout Berhasil";
			return;
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
