<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if( ! function_exists('AdminID')){
    function AdminID(){
		
		$ci=& get_instance();
		
		if($ci->session->userdata('is_logged_in')){
			return $ci->session->userdata('member_id');
		}
		return false;	
	}
}

if( ! function_exists('MemberName')){
    function MemberName(){
		
		$ci=& get_instance();
		
		if($ci->session->userdata('is_logged_in')){
			return ucwords(strtolower($ci->session->userdata('member_name')));
		}
		return false;	
	}
}

if( ! function_exists('MemberType')){
    function MemberType(){
		
		$ci=& get_instance();
		
		if($ci->session->userdata('is_logged_in')){
			return (($ci->session->userdata('member_type')));
		}
		return false;	
	}
}