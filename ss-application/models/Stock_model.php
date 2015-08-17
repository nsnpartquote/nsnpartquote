<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model{
	
	function get_nsn_information($part_code = NULL){
	
		//if($part_code){
				  $this->db->where('product_nsn', $part_code);
		$Result = $this->db->get('product_nsn_information');
		//}
		if($Result->num_rows() > 0)
			return $Result->row_array();
		return false;
	}	
	function get_product_information($product_id = NULL){
		
		//if($product_id)
				  $this->db->where('product_id', $product_id);
		$Result = $this->db->get('product_details');
		if($Result->num_rows() > 0)
			return $Result->row_array();
		return false;
	}
	
	
	
}