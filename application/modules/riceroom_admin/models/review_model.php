<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'reviews';
		$this->primary_key='id';		
	}

	public function rating_value($id)
	{
		$query = "SELECT sum(rr.rating) rating
		          FROM `reviews` AS rr
		          WHERE rr.product_id =$id";
		$query=$this->db->query($query);
		return $query->row();
	}

}