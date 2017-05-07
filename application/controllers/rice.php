<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rice extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this -> load -> model ('riceroom_admin/products_model', 'product');
	}

	public function index($url_name='')
	{
		$url_name=trim(str_replace('-',' ',preg_replace('/[^A-Za-z0-9\-]/',' ',$url_name)));
		if($url_name!='' && $this -> cats -> count_all_results(array('name'=>$url_name))) :
			$cat_data = $this -> cats -> get('name',$url_name);
			$this->data['cat_data']=$cat_data;
			$check_data=array('parent_id'=>$cat_data->id,'status'=>'1');
			$this -> data['all_categories'] = $this->cats->get_all($check_data);
			$this -> data['all_products']   = $this->product->category_product($cat_data->id,$this->data['city_id']);
			$this -> data['page'] = 'product';
			$this -> load->view('template', $this->data, FALSE);
		else:
			show_404();
		endif;	
	}	

	public function shop_now()
	{
		$this -> data['all_categories'] = $this->product->category_shop();
		$this -> data['all_products']   = $this->product->category_shop_product($this->data['city_id']);
		//	echo $this->db->last_query(); exit;
		$this -> data['page'] = 'shop_now';
		$this -> load->view('template', $this->data, FALSE);
	}

	public function wholesale_zone()
	{
		$this -> data['all_categories'] = $this->product->category_shop();
		$this -> data['all_products']   = $this->product->category_whole_product($this->data['city_id']);
		$this -> data['page'] = 'wholesale_zone';
		$this -> load->view('template', $this->data, FALSE);
	}


	
}

