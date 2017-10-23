<?php
class cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography','date'));
		$this->load->library(array('session', 'form_validation','pagination','cart'));
		$this->load->database();
		$this->load->model('user');
	}
	
	public function index()
	{
		$details['query']=$this->user->showcart($this->session->userdata('uid'));
		$this->load->view('client/header');
		$this->load->view('client/cart',$details);
		$this->load->view('client/footer');
	}

	 public function remove_cart()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('cart', array('id'=>$id,
                                          'uid'=>$uid));
    }

    public function itemadd()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('id');
    	$item=$this->input->post('item');
		$this->db->query('update cart set item="'.$item.'" where id="'.$id.'" and uid="'.$uid.'"');
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
	 public function cartadd1()
	{
	 
		$data = array(
        'id'  =>$this->input->post('id'),
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => 'T-Shirt'
		);
		$this->cart->insert($data);
	

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
		
}