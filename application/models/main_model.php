<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class main_model
 * @author kddp_abaquitae
 */
class main_model extends CI_Model{

	public function retrieveUsers(){
		$query = $this->db->query("SELECT BorrowerName, DateTime FROM logtable"); 
		return $query->result();
	}

	public function updateBorrower($arrData){
		$name = $arrData['BorrowerName'];
		$id = $arrData['id'];
		$dt = $arrData['DateTime'];

		$query = $this->db->query("UPDATE logtable SET BorrowerName='$name' where id='$id'");
		$query = $this->db->query("UPDATE logtable SET DateTime='$dt' where id='$id'");
	}

	public function getPassword($username){
		$query = $this->db->query("SELECT password FROM information where username='$username'"); 
		$password;
		foreach ($query->result() as $row) {
			$password = $row->password;	
		}
		return $password;
	}

	public function updatePassword($arrData){
		$name = $arrData['username'];
		$password = $arrData['password'];

		$query = $this->db->query("UPDATE information SET password='$password' where username='$name'");
	}
	
}
