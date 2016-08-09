<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function register()
	{
		// $this->load->library("form_validation");
		// $this->form_validation->set_rules("first", "First Name", "trim|required");
		// $this->form_validation->set_rules("last", "Last Name", "trim|required");
		// $this->form_validation->set_rules("email", "Email", "trim|valid_email|is_unique[users.email]|required");
		// $this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|matches[confirm_password]|md5");

		// if($this->form_validation->run() === FALSE)
		// {
		// 	$this->session->set_flashdata("registration_errors", validation_errors());
		// 	$this->load->view('/Products/storeView');
		// }

		// else 
		// {
			$this->load->model("User");
			$user_input = $this->input->post();	
			$new_user = $this->User->add_user($user_input);
			if($new_user){
				$current_user = $this->User->get_user_by_email($this->input->post('email'));
				$this->session->set_userdata('current', $current_user);
			}
			else{
				$this->session->set_flashdata("reg_errors", "reg failed");
			}
			redirect('/');	
			// $this->load->view("messages")	
			// $insert_user = $this->User->insert_user($user_input);
			// $get_user = $this->User->get_user($this->input->post());
			
			// if($insert_user){				
			// 	// $this->session->set_userdata("user_session", $user_input);
			// 	$this->session->set_userdata("user_session", $get_user);
			// 	redirect(base_url('/Products/storeView'));
			// }
			// else{
			// 	$this->session->set_flashdata("registration_errors", "registration failed");
			// 	$this->load->view('/Products/storeView');
			// }
		// }
	}

	public function login()
	{		
		// $this->load->library("form_validation");
		// $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		// $this->form_validation->set_rules("password", "Password", "trim|min_length[8]|required|md5");
		
		// if($this->form_validation->run() === FALSE)
		// {
		// 	$this->session->set_flashdata("login_errors", validation_errors());
		// 	redirect(base_url('/Products/storeView'));
		// }
		// else
		// {
			$this->load->model("User");							   
			$get_user = $this->User->get_user_by_email($this->input->post('email'));
			if($get_user && $get_user['password'] == $this->input->post('password')){
				$this->session->set_userdata("current", $get_user);
			}
			else{
				$this->session->set_flashdata('login_errors', 'Invalid email and/or password');
			}
			redirect('/');
		// }
	}


// 	public function signOut() {
		
// 		$this->session->sess_destroy();
		
// 		redirect(base_url("/Products/storeView"));

// 	}

// 	public function storeView() {
// 		$this->load->view('storeView');
// 	}

// 	public function checkout()
// 	{
// 		$this->output->enable_profiler(TRUE);
// 		$this->load->view('checkout');
// 	}
// 	public function addAddress()
// 	{
// 		$this->load->library("form_validation");
// 		$this->form_validation->set_rules("firstNameS", "First Name", "trim|required");
// 		$this->form_validation->set_rules("lastNameS", "Last Name", "trim|required");
// 		$this->form_validation->set_rules("streetS", "Address", "trim|required");
// 		$this->form_validation->set_rules("apt2S", "Apartment Number", "trim");
// 		$this->form_validation->set_rules("cityS", "City", "trim|required");
// 		$this->form_validation->set_rules("stateS", "State", "trim|required");
// 		$this->form_validation->set_rules("zipcodeS", "Zipcode", "trim|required");


// 		if($this->form_validation->run() === FALSE)
// 		{
// 			$this->session->set_flashdata("shipping_errors", validation_errors());
// 			$this->load->view('/cart');
// 		}

// 		else 
// 		{
// 			$addressInfo['addressInfo'] = $this->input->post();
// 			$this->load->model("User");
// 			$this->User->insertAddress($addressInfo['addressInfo']);
// // insert database success code

// 			$this->load->view("checkout", $addressInfo);
			
// 			// $this->load->model("User");
// 			// $user_input = $this->input->post();			
// 			// $insert_user = $this->User->insert_user($user_input);
			
// 			// if($insert_user)
// 			// {				
// 			// 	$this->session->set_userdata("user_session", $user_input);
// 			// 	redirect(base_url("/Products/storeView"));
// 			// }
// 			// else
// 			// {
// 			// 	$this->session->set_flashdata("registration_errors", "registration failed");
// 			// 	$this->load->view('/Products/storeView');
// 			// }
// 		}

// 	}


// 	public function cart()
// 	{
// 		$this->output->enable_profiler(TRUE);
// 		// var_dump($this->input->post());
// 		// die();
// 		$this->load->view('cart');
// 	}
	

}























