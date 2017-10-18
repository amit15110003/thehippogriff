<?php
class wishlist extends CI_Controller
{
	public function __construct()
	{	
		
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user');
		if(!$this->session->userdata('uid')){
                redirect('login', 'refresh');
         }

	}
	
	public function index()
	{
		$details['query']=$this->user->showwishlist($this->session->userdata('uid'));
		$details['category']=$this->user->showcategory();
		$this->load->view('header',$details);
		$this->load->view('wishlist',$details);
	}

	 public function remove_wish()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('wishlist', array('id'=>$id,
                                          'uid'=>$uid));
    }
	
		
}