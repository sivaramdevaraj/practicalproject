<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'orders';
		$this->primary_key='id';		
	}

}