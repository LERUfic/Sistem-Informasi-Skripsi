<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Model {

	private $db;

    public function __construct() {
        parent::__construct();

        $this->db = $this->load->database('default', true);
    }

    public function createUser($data){
        //Check if user already exists
    	$this->db->select('1');
		$this->db->from('tb_user');
    	$this->db->where('nrp',$data['nrp']);
    	$ret = $this->db->get()->result_array();

        //0 user
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

    public function insertRMK($data){
        //Check if user already exists
        $this->db->select('1');
        $this->db->from('tb_user');
        $this->db->where('nrp',$data['iduser']);
        $ret = $this->db->get()->result_array();

        //1 User
        if(count($ret) == 1){
            //Check if user with rmk exists
            $this->db->select('1');
            $this->db->from('user_rmk');
            $this->db->where('iduser',$data['iduser']);
            $this->db->where('idrmk',$data['idrmk']);
            $ret2 = $this->db->get()->result_array();

            //0 data
            if(count($ret2) == 0){
                $this->db->trans_start();
                $this->db->insert('user_rmk', $data);
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    return "Gagal Melakukan Insert";
                }
                else{
                    return "Berhasil Insert RMK";
                }    
            }
        }
        else{
            return "User Belum Ada";
        }
    }

    public function loginUser($data){
        //Check user with nrp and pass
    	$this->db->select('nrp,nama,email,role');
		$this->db->from('tb_user');
    	$this->db->where('nrp',$data['nrp']);
    	$this->db->where('pass',$data['pass']);
    	$ret = $this->db->get()->result_array();

        //1 user
    	if(count($ret) == 1){
    		$this->session->set_userdata('login_data', $ret[0]);
    		return "Login Berhasil";
    	}
    	else{
    		return "Login Gagal";
    	}
    }

    public function getRMK(){
        //Get all rmk info
        $this->db->select('id,srmk,lrmk');
        $this->db->from('rmk');
        $ret = $this->db->get()->result_array();

        return $ret;
    }

    public function getProposal($data){
        $this->db->select('*');
        $this->db->from('proposal');
        $this->db->where('nrp',$data);
        $ret = $this->db->get()->result_array();

        return $ret;
    }

    public function getAllProposal(){
        $this->db->select('*');
        $this->db->from('proposal');
        $ret = $this->db->get()->result_array();

        return $ret;        
    }

    public function sendProposal($data){
        $this->db->trans_start();
        $this->db->insert('proposal', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return "Gagal Melakukan Insert";
        }
        else{
            return "Berhasil Insert Proposal";
        }
    }
}

/* End of file skripsi.php */
/* Location: ./application/models/skripsi.php */
