<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography','date'));
		$this->load->library(array('session', 'form_validation','pagination'));
		$this->load->database();
		$this->load->model('user');
	}

	public function index($category,$id)
	{	
		$details['query']=$this->user->showproduct();
		$details['category']=$this->user->showcategory();
		$this->load->view('header',$details);
		$this->load->view('single-product.php',$details);
	}

	public function category($category)
	{	
		$category = str_replace('%20', ' ', $category);
		$config = array();
        $config["base_url"] = base_url() . "index.php/product/view/$category";
        $config["total_rows"] = $this->user->countproduct_category($category);
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $details['query'] = $this->user->showproduct_category($config["per_page"], $page,$category);
        $details["links"] = $this->pagination->create_links();
		$details['query3']=$this->user->showpurity();
		$details['categoryval']=$category;
		$this->load->view('client/header');
		$this->load->view('client/category',$details);
		$this->load->view('client/footer');
	}

	public function details($category,$id)
	{	
		$details=$this->user->get_product_id($id);
		$details['category']=$this->user->showcategory();
		$data['query']=$this->user->get_image_id($id);
		$data['query1']=$this->user->get_review_id($id);
		$data['query2']=$this->user->showproduct_mostview_cat($category);
			$data['id'] = $details[0]->id;
			$data['picture'] = $details[0]->picture;
			$data['title'] = $details[0]->title;
        	$data['Descr'] = $details[0]->Descr;
        	$data['cost'] = $details[0]->cost;
        	$data['category'] = $details[0]->category;
        	$data['rate'] = $details[0]->rate;
        	$data['review'] = $details[0]->review;
        	$data['view'] = $details[0]->view;
        	$view=$data['view']+1;
		$this->user->updateview($id,$view);
		$this->load->view('header',$details);
		$this->load->view('single-product.php',$data);
	}

	 function viewsort($category){
        $sortBy = $this->input->post('sortBy');
        $gender = $this->input->post('gender');
         $purity = $this->input->post('purity');
        $price1 = $this->input->post('price1');
        $price2 = $this->input->post('price2');
        $category = str_replace('%20', ' ', $category);
        $details['categoryval']=$category;
		$details['category']=$this->user->showcategory();
        if($sortBy=="high")
        {
		$details['query']=$this->user->sortproduct_high($category,$gender,$price1,$price2,$purity);
		}
		else if($sortBy=="low")
		{
			$details['query']=$this->user->sortproduct_low($category,$gender,$price1,$price2,$purity);
		}
		else if($sortBy=="popular")
		{
			$details['query']=$this->user->sortproduct_popular($category,$gender,$price1,$price2,$purity);
		}
		else if($sortBy=="new")
		{
			$details['query']=$this->user->sortproduct_new($category,$gender,$price1,$price2,$purity);
		}
		else
		{
			$details['query']=$this->user->sortproduct($category,$gender,$price1,$price2,$purity);
		}
		$this->load->view('category1.php',$details);
    }


	public function login()
    {
		// get form input
		$email = $this->input->post("email");
        $password = $this->input->post("password");

		// form validation
		$this->form_validation->set_rules("email", "Email-ID", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
		}
		else
		{
			// check for user credentials
			$uresult = $this->user->get_user($email,$password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'fname' => $uresult[0]->fname,'lname' => $uresult[0]->lname, 'uid' => $uresult[0]->id,'email'=> $uresult[0]->email,'contact'=> $uresult[0]->contact);

				$this->session->set_userdata($sess_data);
				
				redirect('');
				
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('');
			}
		}
    }

    
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('');
	}
}
