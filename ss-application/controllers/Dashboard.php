<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct(){
		parent::__construct();  
	
		$this->load->model('stock_model');	
		/*if( ! AdminID() )
			redirect('sign-in');*/
				
	}
	
	function index(){
		
		$data['body_title']		= 'Dashboard';
		$data['body_content']	= 'dashboard';
		$this->load->view('includes/template', $data);
	}
	public function get_product_information(){
	
		$part_code = $this->input->post('part_search');
	
		if($part_code){
		$product_nsn_info = $this->stock_model->get_nsn_information($part_code);
		$product_id = $product_nsn_info['product_fkid'];
		$product_product_info = $this->stock_model->get_product_information($product_id);
		$product_nsn 	 = array('product_nsn'=>$product_nsn_info);
		$product_info = array('product_info'=>$product_product_info);
	
		$user_value = array_merge($product_nsn, $product_info);
		}else{
			$user_value = array('status'=>0);
		}
		
		echo json_encode($user_value);
			
	}	
	public function send_email_customer(){
	
		$response = array('status' => false, 'message' => '');
		$this->load->library('form_validation');
	 	    
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|valid_email');
		$this->form_validation->set_rules('part_no', 'Part Number', 'trim|required');		
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|integer');			
	
		if($this->form_validation->run() !== false){
			
			$to 	 		= $this->input->post('email');
			$part_no 		= $this->input->post('part_no');
			$total_products = $this->input->post('quantity');
			
		$config = array();
		$config = $this->config->item('EmailVars');
		
		$message= "Hi Dear Customer, <br/>
		We received your order partid no : ".$part_no." quantities ".$total_products.".<br/> 
		you should receive a confirmation mail shortly.
		<br/> Thanks for placing order.";
				
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('www.nsnpartcode.com'); // change it to yours
			$this->email->to($to);// change it to yours
			$this->email->subject('Product Information');
			$this->email->message($message);
			//$this->email->attach($cand_resume_path);
					
			   if($this->email->send()){
				//inserting email data into db
				//$student_errors = array('send'=> 'Email Sent Successfully!');
				
			$this->session->set_flashdata('success_message', 'Email Sent Successfully!');
			$response = array('status' => true, 'message' => 'Email Sent Successfully!');
				
						}else{
			$this->session->set_flashdata('success_message', 'Email Send Fail!');
			$response = array('status' => false, 'message' => 'Email Send Fail!');
				//$student_errors = array('send'=> 'Email Not Send!');			
				//show_error($this->email->print_debugger());
						}		
			
		
		}else {
			
			$response['errors'] = array(
				'email'  	=> form_error('email'),
				'part_no'  	=> form_error('part_no'),
				'quantity'  => form_error('quantity')	
			);
			
		}
		
    	echo json_encode($response);
	
	}	
	
	function logout(){
		
		$SessionData = array('is_logged_in', 'member_id', 'member_name', 'member_type');
		
		$this->session->unset_userdata($SessionData);
		
		redirect();
	}
	
}
