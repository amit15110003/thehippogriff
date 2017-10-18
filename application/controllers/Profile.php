<?php
class profile extends CI_Controller
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
        	$details = $this->user->get_user_by_id($this->session->userdata('uid'));
        	$details1= $this->user->get_delivery_by_id($this->session->userdata('uid'));
        	$data['category']=$this->user->showcategory();
        	$data['contact'] = $details[0]->contact;
        	$data['fname'] = $details[0]->fname;
        	$data['email'] = $details[0]->email;
        	$data['lname'] = $details[0]->lname;
        	$data['address'] = $details[0]->address;
        	if(!empty($details1))
        	{
        	$data['addr'] = $details1[0]->addr;
        	$data['state'] = $details1[0]->state;
        	$data['town'] = $details1[0]->town;
        	$data['country'] = $details1[0]->country;
        	$data['pin'] = $details1[0]->pin;
        	}
        	else{ 
        	$data['addr'] = "";
        	$data['state'] = "";
        	$data['town'] = "";
        	$data['country'] ="";
        	$data['pin'] = "";
        	}
        	$this->load->view('header',$data);
			$this->load->view('profile',$data);
        }
		else
		{
			$id=$this->session->userdata('uid');
		    $fname=$_POST['fname'];
		    $lname=$_POST['lname'];
		    $contact=$_POST['contact'];
			$result=$this->user->update($id, $fname, $lname, $contact);

		if ($result)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('profile/index');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('profile/index');
			}
		}
	}


	public function password()
	{	
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE)
        {
        	redirect('profile');
        }
		else
		{
			$id=$this->session->userdata('uid');
		    $password=$_POST['password'];
			$result=$this->user->updatepass($id, $password);

		if ($result)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('profile');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('profile');
			}
		}
	}

	
	  public function asked()
	{
			$details['query']=$this->user->showquestionbyid($this->session->userdata('uid'));
			$this->load->view('asked',$details);
       
	}

	 public function deletepost()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('question', array('id'=>$id,
                                          'uid'=>$uid));
		$this->db->delete('rply', array('qid'=>$id));
    }

     public function cartadd()
	{
	$uid=$this->session->userdata('uid');
	$postid=$this->input->post('id');
	$checkcart = $this->db->query('select * from cart 
		                            where productid="'.$postid.'" 
		                            and uid = "'.$uid.'"');
	$resultcheckcart = $checkcart->num_rows();


	if($resultcheckcart == '0' ){
	$data=array('productid'=>$postid,'uid'=>$uid);
	$this->db->insert('cart',$data);
	}
	else{

		echo '<script language="javascript">';
		echo 'alert("Already add to cart")';
		echo '</script>';
	}

	}

	 public function wishlist()
	{
	$uid=$this->session->userdata('uid');
	$postid=$this->input->post('id');
	$checkcart = $this->db->query('select * from wishlist 
		                            where productid="'.$postid.'" 
		                            and uid = "'.$uid.'"');
	$resultcheckcart = $checkcart->num_rows();


	if($resultcheckcart == '0' ){
	$data=array('productid'=>$postid,'uid'=>$uid);
	$this->db->insert('wishlist',$data);
		echo '<script language="javascript">';
		echo 'alert("Successfully add to cart")';
		echo '</script>';
	}
	else{
		$this->db->delete('wishlist', array('productid'=>$postid,
										  'uid'=>$uid));
		echo '<script language="javascript">';
		echo 'alert("Already add to cart")';
		echo '</script>';
	}

	}

	public function review()
    {
    	$data = array(
				'uid' => $this->session->userdata('uid'),
				'uname' => $this->input->post('uname'),
				'productid' => $this->input->post('productid'),
				'rate' =>  $this->input->post('rate'),
				'review' => $this->input->post('review'));

		$this->db->insert('review',$data);
		$productid=$_POST['productid'];
		$details=$this->user->get_product_id($productid);
		$review=$details[0]->review +1;
		$rate=$_POST['rate']+($details[0]->rate*$details[0]->review);
		$rateupdate=$rate/$review;
		$this->user->update_review($productid,$rateupdate,$review);
		redirect($_SERVER['HTTP_REFERER']);
    }

    public function remove_wish()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('id');
		$this->db->delete('wishlist', array('productid'=>$id,
                                          'uid'=>$uid));
    }

    public function delivery()
    {
    	$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		
		if ($this->form_validation->run() == FALSE)
        {
        	$details = $this->user->get_user_by_id($this->session->userdata('uid'));
        	$data['category']=$this->user->showcategory();
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
        	$data['contact'] = $details[0]->contact;
        	$data['email'] = $details[0]->email;
        	$data['lname'] = $details[0]->lname;
        	$data['address'] = $details[0]->address;
        	$this->load->view('header',$data);
			$this->load->view('delivery',$data);
        }
		else
		{	$uid =$this->session->userdata('uid');
			$data = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'mob' =>  $this->input->post('mob'),
				'country' => $this->input->post('country'),
				'addr' => $this->input->post('addr'),
				'state' => $this->input->post('state'),
				'town' => $this->input->post('town'),
				'pin' =>  $this->input->post('pin'));
				$result=$this->user->insert_delivery($data,$uid);
		if ($result)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('profile');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('profile');
			}
		}
    }

    
	
	
		
}