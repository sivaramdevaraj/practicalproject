<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this -> load -> model ('riceroom_admin/products_model', 'product');
		$this -> load -> model ('riceroom_admin/gallery_model', 'gallery');
		$this -> load -> model ('riceroom_admin/review_model', 'rating');
	}

	public function index($sku_id)
	{
		$check = array('sku_id'=>$sku_id,'city_id'=>@$this->data['city_id']);
		if($sku_id!='' && $this -> product -> count_all_results($check)) :		
			$this -> data['product_info'] = $this -> product -> get('sku_id',$sku_id);
			$this -> data['p_cat'] = $this -> cats -> get($this -> data['product_info']->cat_id);
			$this -> data['gallery'] = $this -> gallery -> get_all('product_id',$this -> data['product_info']->id);
			$this -> data['categories'] = $this -> cats -> get($this -> data['product_info']->sub_cat_id);
			$this -> data['similar_product'] = $this -> product -> realted_product($this -> data['product_info']->id,$this -> data['product_info']->cat_id,$this->data['city_id']);
			$this -> data['customer_reviews'] = $this -> rating -> get_all('product_id',$this -> data['product_info']->id);
			$this -> data['total_rating'] = $this -> rating -> rating_value($this -> data['product_info']->id);
		    //echo '<pre>'; print_r($this -> data['customer_reviews']);
		    //echo '<pre>'; print_r($this -> data['total_rating']); exit;
		    $this->data['page'] = 'view_product';
			$this->load->view('template', $this->data, FALSE);
		else:
			redirect(site_url('rice/shop_now'));
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
