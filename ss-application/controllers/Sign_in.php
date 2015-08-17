<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_in extends CI_Controller {
	
	public function __construct(){
		parent::__construct(); 
		
		if(AdminID())
			redirect();
		
		$this->load->model('login_model');	
	}
	
	function index(){
		
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			$data['error_message'] = 'Invalid Username / Password!';
			
			if($this->form_validation->run() !== false){
				extract($this->input->post());
				
				$LoginData = array(
					'Username'	=> $username,
					'Password' 	=> $password
				);
				$AdminInfo = $this->login_model->AdminLoginCheck($LoginData);
				if($AdminInfo){
					$this->_SetSessionData($AdminInfo->EmployeeID, $AdminInfo->FirstName, 'E');
					redirect();
				}
			}
		}
		
		$data['login_title']	= 'Siri Sampada Login';
		$this->load->view('login', $data);
	}
	
	function _SetSessionData($MID = 0, $MName = '', $Type = ''){
		$SessionData = array(
			'is_logged_in'	=> TRUE,
			'member_id'		=> $MID,
			'member_name'	=> $MName,
			'member_type'	=> $Type
		);
		$this->session->set_userdata($SessionData);
	}
	
}
