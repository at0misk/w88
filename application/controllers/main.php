<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if(!$this->session->userdata('added')){
			$this->session->set_userdata('added', '');
		}
		$this->load->view('main');
	}
	// public function show($id){   
 //        $this->output->enable_profiler(TRUE); //enables the profiler
 //        $this->load->model("Course"); //loads the model
 //        $course = $this->Course->get_course_by_id($id);  //calls the get_course_by_id method
 //        var_dump($course);
 //    }
    public function register(){
    	$this->load->library("form_validation");
    		$first = $this->input->post('first');
			$last = $this->input->post('last');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$conf = $this->input->post('confpassword');
			$newarr['input'] = array(
				'first' => $first,
				'last' => $last,
				'email' => $email,
				'password' => $password,
				'conf' => $conf
			);
		$this->form_validation->set_rules("first", "First Name", "trim|required");
		$this->form_validation->set_rules("last", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confpassword", "Password", "trim|required");
		$this->form_validation->set_rules("password", "Confirm Password", "required|matches[confpassword]");
		if($this->form_validation->run() === FALSE){
		     $this->session->set_userdata('errors', validation_errors());
		     $this->session->set_userdata('added', ' ');
		     // var_dump($this->session->userdata('errors'));
		     // die();
		     // $this->session->userdata('errors', $this->view_data["errors"]);
		}
		else{
		    $this->load->model("User");
		    $add_user = $this->User->add_user($newarr['input']);
		    if($add_user === TRUE) {
				$this->session->set_userdata('added', 'User added!'); 
				$this->session->set_userdata('errors', ' ');
		    }
		}
		redirect('/');
    }
    public function login(){
    	$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		if($this->form_validation->run() === FALSE){
		     $this->session->set_userdata('errorsL', validation_errors());
		     $this->session->set_userdata('added', ' ');
		     redirect('/');
		}
		else{
    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$newarr['input'] = array(
			'email' => $email,
			'password' => $password
		);
		$this->load->model("User");
		$log = $this->User->get_user_by_email($email);
		if($log && $log['password'] == $password){
			$user = array(
               'first' => $log['first_name'],
               'last' => $log['last_name'],
               'email' => $log['email'],
               'is_logged_in' => true
            );
            $this->session->set_userdata($user);
            redirect("/main/game");
		}
		else{
			$this->session->set_userdata('nouser', 'No User found');
			redirect('/');
		}
		}	
	}
	public function game(){
		$goldArr = [];
		$this->session->set_userdata('gold', $goldArr);
		$this->session->set_userdata('count', 0);
		$this->load->model("User");
		$allUsers = $this->User->get_all_users();
		$this->session->set_userdata('users', $allUsers);
		$this->load->view('game');
	}
	public function farm(){
		$farmG = rand(10,20);
		$counter = $this->session->userdata('count');
		$this->session->set_userdata('count', $counter+$farmG);
		$farmS = "You earned " . $farmG . " gold!<br>";
		$oldArr = $this->session->userdata('gold');
		array_unshift($oldArr, $farmS);
		$this->session->set_userdata('gold', $oldArr);
		$this->load->view('game');
	}
	public function cave(){
		$farmC = rand(5,10);
		$counter = $this->session->userdata('count');
		$this->session->set_userdata('count', $counter+$farmC);
		$farmS = "You earned " . $farmC . " gold!<br>";
		$oldArr = $this->session->userdata('gold');
		array_unshift($oldArr, $farmS);
		$this->session->set_userdata('gold', $oldArr);
		$this->load->view('game');
	}
	public function house(){
		$farmH = rand(2,5);
		$counter = $this->session->userdata('count');
		$this->session->set_userdata('count', $counter+$farmH);
		$farmS = "You earned " . $farmH . " gold!<br>";
		$oldArr = $this->session->userdata('gold');
		array_unshift($oldArr, $farmS);
		$this->session->set_userdata('gold', $oldArr);
		$this->load->view('game');
	}
	public function casino(){
		$farmCa = rand(-50,50);
		$counter = $this->session->userdata('count');
		$this->session->set_userdata('count', $counter+$farmCa);
		if($farmCa > 0){
		$farmS = "You earned " . $farmCa . " gold!<br>";
		$oldArr = $this->session->userdata('gold');
		array_unshift($oldArr, $farmS);
		$this->session->set_userdata('gold', $oldArr);
		}
		else{
			$farmS = "<span class='red'>You lost " . abs($farmCa) . " gold!</span><br>";
			$oldArr = $this->session->userdata('gold');
			array_unshift($oldArr, $farmS);
			$this->session->set_userdata('gold', $oldArr);
		}
		$this->load->view('game');
	}
}
?>