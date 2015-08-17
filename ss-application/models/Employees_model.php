<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_model extends CI_Model{
	
	function Employees($PerPage = 0, $Offset = 0){
	
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->order_by('FirstName', 'asc');
		$Result = $this->db->get('employees');
		if($Result->num_rows() > 0)
			return $Result->result();
		return false;
	}	
	function EmployeesCount(){
		
		$Result = $this->db->get('employees');
		if($Result->num_rows() > 0)
			return $Result->num_rows();
			
		return 0;
	}
	
	function CreateEmployee($EmployeeData = NULL){
		if($EmployeeData){		
			$this->db->insert('employees', $EmployeeData);
			return $this->db->insert_id();
		}
		return false;
	}
	function UpdateEmployee($EmployeeData = NULL, $EmployeeID = NULL){
		if($EmployeeID && $EmployeeData){
			$this->db->update('employees', $EmployeeData, array('EmployeeID' => $EmployeeID));
			return true;
		}
		return false;
	}
	function EmployeeDetails($EmployeeID = NULL){
		if($EmployeeID){
			$this->db->where(array('EmployeeID' => $EmployeeID));
			$Result = $this->db->get('employees');
			if($Result->num_rows() > 0)
				return $Result->row();
		}
		return false;
	}
	
	function ActiveLocations($ParID = NULL){
		if($ParID)
			$this->db->where('location_par_id', $ParID);
		else
			$this->db->where('location_par_id', 0);
			
		$this->db->where('location_status', 1);
		$this->db->order_by('location_name', 'asc');
		$Locations = $this->db->get('locations');
		if($Locations->num_rows() > 0)
			return $Locations->result();
		return false;
	}
}