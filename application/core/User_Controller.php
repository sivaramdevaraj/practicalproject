<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();			
		$this->load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/city_model','city');
		$this -> load -> model ('riceroom_admin/pages_model','pages');
		$this -> load -> model ('riceroom_admin/contents_model','contents');
		$this ->  load -> model('users_model', 'users');		
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this->data['cart_content']= $this->cart->contents();
		$this -> db ->order_by('id','ASC');	
		$check_data=array('parent_id'=>'0','status'=>'1');
		$this -> data['search_categories'] = $this -> cats -> get_all($check_data);
	    $this->data['cities'] = $this->city->custom_dropdown('id','name',array('state_id'=>'1'));

		if($city_id=$this->input->cookie('city_id', TRUE)) :
			$this->data['city_id'] = $city_id;
			$this->data['cat_search'] = $this->cats->cat_search_product(@$city_id);
			$this->data['sub_cat_search'] = $this->cats->subcat_search_product(@$city_id);
			$this->data['product_cat_search'] = $this->cats->search_product(@$city_id);

		endif;		
		if($user_id=$this -> session -> userdata('user')) :
			$this->data['user_details']=$this->users->get($user_id);
		else:
			$this->data['user_details']="";
		endif;


 //---------------------- All categories json -------------------------------
    	$json_data=array();
		$all_datas = $this->cats->cat_search_product($city_id);	
		foreach($all_datas as $rec)//foreach loop  
		{  
		    $json_array=$rec->cat_name; 
		    array_push($json_data,$json_array);  
		}

		$sub_cat = $this->cats->subcat_search_product($city_id);
		foreach($sub_cat as $sub_cats)//foreach loop  
		{  
		    $json_array=$sub_cats->sub_cat_name; 
		    array_push($json_data,$json_array);  
		}

		$product = $this->cats->search_product($city_id);
		foreach($product as $products)//foreach loop  
		{  
		    $json_array=$products->product_type; 
		    array_push($json_data,$json_array);  
		}
		
		$this->data['json_data'] = json_encode($json_data);		
 //---------------------- end categories json -------------------------------
 //----------------------  CMS ----------------------------------------
	$this-> data['return_policy'] = $this-> contents ->get_all('page_id','2');
	$this-> data['cancellation'] = $this-> contents ->get_all('page_id','3');
	$this-> data['aboutus'] = $this-> contents ->get('page_id','4');
	$this-> data['terms_condition'] = $this-> contents ->get_all('page_id','5');
	$this-> data['privacy_policy'] = $this-> contents ->get_all('page_id','6');
	$this-> data['facebook'] = $this-> contents ->get('id','30');
	$this-> data['gmail'] = $this-> contents ->get('id','31');
	$this-> data['twitter'] = $this-> contents ->get('id','32');
	$this-> data['google_plus'] = $this-> contents ->get('id','33');
	$this-> data['linkedin'] = $this-> contents ->get('id','34');
	$this-> data['address'] = $this-> contents ->get('id','26');
	$this-> data['phone'] = $this-> contents ->get('id','27');
	$this-> data['email'] = $this-> contents ->get('id','28');
	$this-> data['fax'] = $this-> contents ->get('id','29');

 //----------------------  CMS  ends here-------------------------------


	}
	
}