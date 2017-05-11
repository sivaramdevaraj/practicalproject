<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_assign_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'product_assign';
		$this->primary_key='id';		
	}	
	public function product_list($cat_id)
	{
		$query="SELECT DISTINCT p.name productname,p.price,p.sku_id,p.image,pa.last_update,pa.id assignid FROM `product_assign` pa 
		JOIN products p ON pa.p_id=p.id
		where pa.cat_id='$cat_id' group by p.style";
		$results= $this->db->query($query);
		return $results->result();
	}
}