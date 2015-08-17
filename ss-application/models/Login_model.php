<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
	
	function AdminLoginCheck($LoginData = NULL){
		
		if($LoginData){
			$this->db->where($LoginData);
			$this->db->where(array('Status' => 1));
			$Admin = $this->db->get('employees');
			
			if($Admin->num_rows() > 0)
				return $Admin->row();
		}
		return false;
	}
	
}