<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comments extends CI_Controller {

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
		$this->load->model("message");
		$messages['allMessages'] = $this->message->get_all_messages();
		// var_dump($allMessages);
		// die;
		$this->load->view('messages', $messages);
	}
	public function new(){
		$commentArr = $this->input->post();
		$commentArr['user_id'] = $this->session->current["id"];
		$this->load->model("comment");
		$addComment = $this->comment->addNewComment($commentArr);
		if($addComment){
			$this->session->set_flashdata("messageSucc", "Success adding message");
		}
		else{
			$this->session->set_flashdata("messageErr", "Error adding message");
		}
		redirect(base_url('/'));
	}
}
?>