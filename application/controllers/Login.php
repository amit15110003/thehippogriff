<?php
class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation','cart'));
		$this->load->database();
		$this->load->model('user');
	}
    public function index()
    {
		// get form input
		$email = $this->input->post("email");
        $password = $this->input->post("password");

		// form validation
		$this->form_validation->set_rules("email", "Email-ID", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			$details['category']=$this->user->showcategory();
			$this->load->view('client/header',$details);
			$this->load->view('client/login');
			$this->load->view('client/footer');
		}
		else
		{
			// check for user credentials
			$uresult = $this->user->get_user($email, $password);
			if (count($uresult) > 0)
			{
				// set session
				
				$sess_data = array('login' => TRUE, 'fname' => $uresult[0]->fname,'lname' => $uresult[0]->lname, 'uid' => $uresult[0]->id,'email'=> $uresult[0]->email,'contact'=> $uresult[0]->contact);

				$this->session->set_userdata($sess_data);
				if ($cart = $this->cart->contents())
				{
					foreach ($cart as $item)
					{
						$uid=$this->session->userdata('uid');
						$postid=$item['id'];
						$checkcart = $this->db->query('select * from cart 
					                            where productid="'.$postid.'" 
					                            and uid = "'.$uid.'"');
						$resultcheckcart = $checkcart->num_rows();


						if($resultcheckcart == '0' ){
						$data=array('productid'=>$postid,'uid'=>$uid);
						$this->db->insert('cart',$data);
						}
						else
						{

							echo '<script language="javascript">';
							echo 'alert("Already add to cart")';
							echo '</script>';
						}		
			    	}
			    }
				$this->cart->destroy();
				redirect($_SERVER['HTTP_REFERER']);
		}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert text-center">Wrong Email-ID or Password!</div>');
				redirect('login/index');
			}
		}
    }
}