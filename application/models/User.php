<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        $this->tableName = 'user';
		$this->primaryKey = 'id';
    }
	
	function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('password', md5($pwd));
        $query = $this->db->get('user');
        $data['modified'] = date("Y-m-d H:i:s");
		$update = $this->db->update('user',$data);
		return $query->result();
	}
	    function get_userpass($email)
	{
		$this->db->where('email', $email);    
                $query = $this->db->get('user');
		return $query->result();
	}
	function get_account($uid)
	{
		$this->db->where('uid', $uid);
        $query = $this->db->get('account');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
    {
    	$data['created'] = date("Y-m-d H:i:s");
		return $this->db->insert('user', $data);
	}

	function update($id, $fname, $lname, $contact)
    {	
    	$data = array('fname'=>$fname, 'lname'=>$lname, 'contact'=>$contact);
    	$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function showcategory()
	{
		$query=$this->db->get('category');;
		return $query->result();
	}
	public function showwishlist($id)
	{	
		$this->db->where('uid', $id);
		$query=$this->db->get('wishlist');;
		return $query->result();
	}
	public function showcart($id)
	{	
		$this->db->where('uid', $id);
		$query=$this->db->get('cart');;
		return $query->result();
	}
	function countproduct($id)
	{	
		$this->db->where('uid', $id);
		$this->db->select_sum('id');
	    $this->db->from('cart');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}

	function countproduct_category($category)
	{	
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$this->db->select_sum('id');
	    $this->db->from('product');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}
	
	
	
	public function showpurity()
	{   $query=$this->db->get('purity');;
		return $query->result();
	}
	public function showtype()
	{
		$query=$this->db->get('type');;
		return $query->result();
	}
	
	public function showproduct()
	{
		$query=$this->db->get('product');
		$this->db->where('status', "hosted");
		return $query->result();
	}

	public function showproduct_category($limit, $start,$category)
	{	
		$this->db->limit($limit, $start);
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_product_id($category,$title)
	{	
		$this->db->where('category', $category);
		$this->db->where('title', $title);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function get_product_by_id($id)
	{	
		$this->db->where('id', $id);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function showdesign($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get('product');;
		return $query->result();
	}

	function insert_view($id,$view)
	{
		$data1 = array('view'=>$view);
		$this->db->where('id', $id);
        return $this->db->update('product', $data1);
	}
	function shortlist($id,$uid)
	{
		$data = array('lib'=>$id,'uid'=>$uid);
        return $this->db->insert('shortlist', $data);
	}

	public function get_image_id($id)
	{	
		$this->db->where('productid',$id);
		$query=$this->db->get('image');
		return $query->result();
	}
	/*cart model*/
	function check_cart($uid,$id)
	{
	    $this->db->where('productid', $id);
	    $this->db->where('uid', $uid);
	    $query = $this->db->get('cart');
	    return $query->result();
	}

	/*cart model end*/
	
	/*wishlist model*/
	function check_wish($uid,$id)
	{
	    $this->db->where('productid',$id);
	    $this->db->where('uid',$uid);
	    $query = $this->db->get('wishlist');
	    return $query->result();
	}

	
	/*wishlist model end*/
	public function get_review_id($id)
	{	
		$this->db->where('productid',$id);
		$query=$this->db->get('review');
		return $query->result();
	}
	function countreview($id,$uid)
	{	
		$this->db->where('uid', $uid);
		$this->db->where('productid', $id);
		$this->db->select_sum('id');
	    $this->db->from('review');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}

	public function showproduct_maxrate()
	{ 	$this->db->limit(3);
		$this->db->order_by("rate", "desc");
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function showproduct_new()
	{ 	$this->db->limit(3);
		$this->db->order_by("id", "desc");
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function showproduct_mostview()
	{ 	$this->db->limit(10);
		$this->db->order_by("view", "desc");
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function showproduct_mostview_cat($category)
	{ 	$this->db->limit(10);
		$this->db->order_by("view", "desc");
		$this->db->where('category',$category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}

	function countreview_product($id)
	{	
		$this->db->where('productid', $id);
		$this->db->select_sum('id');
	    $this->db->from('review');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}

	function update_review($productid,$review)
    {	
    	$data = array('review'=>$review);
    	$this->db->where('id', $productid);
		return $this->db->update('product', $data);
	}
	function updateview($id,$view)
    {	
    	$data = array('view'=>$view);
    	$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}
	function insert_subscriber($data)
    {
		return $this->db->insert('subscribe', $data);
	}
	function insert_delivery($data,$uid)
    {
		 $this->db->where('uid',$uid);
	   $q = $this->db->get('delivery');

	   if ( $q->num_rows() > 0 ) 
	   {
	      $this->db->where('uid',$uid);
	      $this->db->update('delivery',$data);
	   } else {
	      $this->db->set('uid', $uid);
	      $this->db->insert('delivery', $data);
	   }
	}
	function insert_shipping($data,$uid)
    {
		 $this->db->where('uid',$uid);
	   $q = $this->db->get('shipping');

	   if ( $q->num_rows() > 0 ) 
	   {
	      $this->db->where('uid',$uid);
	      $this->db->update('shipping',$data);
	   } else {
	      $this->db->set('uid', $uid);
	      $this->db->insert('shipping', $data);
	   }
	}
	function get_delivery_by_id($id)
	{
		$this->db->where('uid', $id);
        $query = $this->db->get('delivery');
		return $query->result();
	}
	function update_delivery($data,$uid)
    {	
    	$this->db->where('uid',$uid);
	   $q = $this->db->get('delivery');

	   if ( $q->num_rows() > 0 ) 
	   {
	      $this->db->where('uid',$uid);
	      $this->db->update('delivery',$data);
	   } else {
	      $this->db->set('uid', $uid);
	      $this->db->insert('delivery', $data);
	   }
	}
	function countproduct_search($keyword)
	{	$this->db->like('title',$keyword);
    	$this->db->or_like('category',$keyword);
    	$this->db->or_like('scategory',$keyword);
    	$this->db->or_like('Descr',$keyword);
		$this->db->where('status', "hosted");
		$this->db->select_sum('id');
	    $this->db->from('product');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}
	function search($limit, $start,$keyword)
	{
		$this->db->limit($limit, $start);
	    $this->db->like('title',$keyword);
	    $this->db->or_like('category',$keyword);
	    $this->db->or_like('scategory',$keyword);
	    $this->db->or_like('Descr',$keyword);
			$this->db->where('status', "hosted");
	    $query  =   $this->db->get('product');
	    return $query->result();
	}
	public function deliveryadd($id)
	{	
		$this->db->where('uid',$id);
		$query=$this->db->get('delivery');
		return $query->result();
	}
	public function shippingadd($id)
	{	
		$this->db->where('uid',$id);
		$query=$this->db->get('shipping');
		return $query->result();
	}
	public function showslider()
	{
		$query=$this->db->get('slider');;
		return $query->result();
	}
	public function sortproduct($category)
	{ 
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function sortproduct_high($category)
	{ 
		$this->db->order_by("cost", "desc");
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function sortproduct_low($category)
	{ 
		$this->db->order_by("cost", "asc");
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function sortproduct_popular($category)
	{ 
		$this->db->order_by("rate", "desc");
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
	public function sortproduct_new($category)
	{ 
		$this->db->order_by("posted", "desc");
		$this->db->where('category', $category);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}
}?>