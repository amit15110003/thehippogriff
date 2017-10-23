<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{	
		
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation','pagination','cart'));
		$this->load->database();
		$this->load->model('user');

	}

	public function index()
	{	
		$this->load->view('client/header');
		$this->load->view('client/index');
		$this->load->view('client/footer');
	}
	public function about()
	{	
		$this->load->view('client/header');
		$this->load->view('client/about');
		$this->load->view('client/footer');
	}
	public function contact()
	{	
		$this->load->view('client/header');
		$this->load->view('client/contact');
		$this->load->view('client/footer');
	}
	public function terms_and_condition()
	{	
		$this->load->view('client/header');
		$this->load->view('client/terms');
		$this->load->view('client/footer');
	}
	public function privacy_policy()
	{	
		$this->load->view('client/header');
		$this->load->view('client/policy');
		$this->load->view('client/footer');
	}
	public function faqs()
	{	
		$this->load->view('client/header');
		$this->load->view('client/faq');
		$this->load->view('client/footer');
	}
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
	

}
