<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Model {

	private $db;

    public function __construct() {
        parent::__construct();

        $this->db = $this->load->database('default', true);
    }

    public function createUser($data){
    	$this->db->select('*');
		$this->db->from('tb_user');
    	$this->db->where('nrp',$data['nrp']);
    	$ret = $this->db->get()->result_array();

    	if(count($ret) == 0){
    		$this->db->trans_start();
    		$this->db->insert('tb_user', $data);
    		$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
			   return "Gagal Melakukan Insert";
			}
			else{
			   return "Berhasil Insert User";
			}
    	}
    	else{
    		return "User Telah Ada";
    	}
    }

    public function loginUser($data){
    	$this->db->select('*');
		$this->db->from('tb_user');
    	$this->db->where('nrp',$data['nrp']);
    	$this->db->where('pass',$data['pass']);
    	$ret = $this->db->get()->result_array();

    	if(count($ret) == 1){
    		$this->session->set_userdata('login_data', $ret[0]);
    		return "Login Berhasil";
    	}
    	else{
    		return "Login Gagal";
    	}
    }

}

/* End of file skripsi.php */
/* Location: ./application/models/skripsi.php */
