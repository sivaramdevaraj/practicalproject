<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_details_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'order_products';
		$this->primary_key='id';		
	}

}	
