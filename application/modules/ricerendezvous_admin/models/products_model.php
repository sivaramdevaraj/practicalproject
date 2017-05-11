<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'products';
	}

	public function product_all()
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE whole_sale ='0'";		
		return $this -> db -> query($query) -> result();
	}

	public function whole_sale_product_all()
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE whole_sale ='1'";		
		return $this -> db -> query($query) -> result();
	}

	public function category_product($cat_id,$city_id)
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.cat_id='$cat_id' AND p.whole_sale='0' AND p.city_id='$city_id' GROUP BY p.group_id";
		return $this -> db -> query($query) -> result();
	}

	public function category_shop_product($city_id)
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.whole_sale='0' AND p.city_id='$city_id' GROUP BY p.group_id";
		return $this -> db -> query($query) -> result();
	}

	public function category_whole_product($city_id)
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.whole_sale='1' AND p.city_id='$city_id'";
		return $this -> db -> query($query) -> result();
	}

	public function category_shop()
	{
		$query="SELECT cc.*,c.name cat_name FROM categories c
		 JOIN categories cc ON c.id=cc.parent_id
		 WHERE c.status='1'";
		return $this -> db -> query($query) -> result();
	}

	public function realted_product($id,$cat_id,$city_id)
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.cat_id='$cat_id' AND p.city_id='$city_id' AND p.id!='$id' AND p.whole_sale='0' GROUP BY p.group_id limit 4";
		return $this -> db -> query($query) -> result();
	}

	public function search_shop_product($search_data,$city_id)
	{
		$query="SELECT DISTINCT p.*,c.name AS cat_name,cc.name AS sub_cat_name
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.city_id=$city_id AND p.whole_sale ='0' AND (c.name LIKE '%$search_data%' OR 
				cc.name LIKE '%$search_data%' OR p.product_type LIKE '%$search_data%') GROUP BY p.group_id";
		return $this -> db -> query($query) -> result();
	}

	public function search_category_shop($search_data,$city_id)
	{
		$query="SELECT DISTINCT c.name cat_name,cc.*
				FROM products p
				JOIN categories c ON p.cat_id=c.id		
				JOIN categories cc ON p.sub_cat_id=cc.id WHERE p.city_id='$city_id' AND p.whole_sale ='0' AND (c.name LIKE '%$search_data%' OR 
				cc.name LIKE '%$search_data%' OR p.product_type LIKE '%$search_data%')  GROUP BY p.group_id";
		return $this -> db -> query($query) -> result();
	}

}