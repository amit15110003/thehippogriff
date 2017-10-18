<?php
class checkout extends CI_Controller
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
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		if ($this->form_validation->run() == FALSE)
        {
		$details['query']=$this->user->showcart($this->session->userdata('uid'));
		$details['category']=$this->user->showcategory();
		$details1=$this->user->deliveryadd($this->session->userdata('uid'));
			if(!empty($details1)){
			$data['fname'] = $details1[0]->fname;
			$data['lname'] = $details1[0]->lname;
			$data['country'] = $details1[0]->country;
			$data['state'] = $details1[0]->state;
			$data['town'] = $details1[0]->town;
			$data['addr'] = $details1[0]->addr;
			$data['mob'] = $details1[0]->mob;
			$data['pin'] = $details1[0]->pin;}
			else{
			$data['fname'] = "";
			$data['lname'] = "";
			$data['country'] = "";
			$data['state'] ="";
			$data['town'] = "";
			$data['addr'] ="";
			$data['mob'] = "";
			$data['pin'] ="";}
		$this->load->view('header',$details);
		$this->load->view('checkout',$data);
		}
		else{
			$uid=$this->session->userdata('uid');
			$data = array(
				
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'mob' =>  $this->input->post('mob'),
				'country' => $this->input->post('country'),
				'addr' => $this->input->post('addr'),
				'state' => $this->input->post('state'),
				'town' => $this->input->post('town'),
				'pin' =>  $this->input->post('pin'));
				$result=$this->user->update_delivery($data,$uid);
		if ($result)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('checkout/payment');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('checkout/payment');
			}

		}
	}

	public function payment()
	{	
		
		$details['query']=$this->user->showcart($this->session->userdata('uid'));
		$details['category']=$this->user->showcategory();
		$details1=$this->user->deliveryadd($this->session->userdata('uid'));
		$data['fname'] = $details1[0]->fname;
		$data['lname'] = $details1[0]->lname;
		$data['country'] = $details1[0]->country;
		$data['state'] = $details1[0]->state;
		$data['town'] = $details1[0]->town;
		$data['addr'] = $details1[0]->addr;
		$data['mob'] = $details1[0]->mob;
		$data['pin'] = $details1[0]->pin;
		$this->load->view('header',$details);
		$this->load->view('checkout1',$data);
		
	}
	
	 public function remove_cart()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('cart', array('id'=>$id,
                                          'uid'=>$uid));
    }

    public function pay_success()
    {
    	$this->load->view('header');
		$this->load->view('success');
    }

	
		
}