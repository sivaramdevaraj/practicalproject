<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'categories';
		$this->primary_key='id';		
	}

	public function cat_search_product($city_id)
	{
		$query="SELECT DISTINCT c.name AS cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				 WHERE whole_sale ='0' Group by c.name";		
		return $this -> db -> query($query) -> result();
	}

	public function subcat_search_product($city_id)
	{
		$query="SELECT DISTINCT cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE whole_sale ='0' Group by cc.name";		
		return $this -> db -> query($query) -> result();
	}

	public function search_product($city_id)
	{
		$query="SELECT DISTINCT p.product_type,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE whole_sale ='0'";
        if($city_id!="")
			$query.=" AND p.city_id=$city_id";
		$query.=" Group by p.product_type";		
		return $this -> db -> query($query) -> result();
	}

}

/* End of file categories_model.php */
