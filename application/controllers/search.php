<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this -> load -> model ('riceroom_admin/products_model', 'product');
			// echo '<pre>'; print_r($this -> data['all_products']); exit;
	}

	public function index()
	{
		if ($_GET['search_data']!="") {
			extract($_GET);
			$search_data=preg_replace('/[^A-Za-z0-9\-]/',' ', $this -> input ->get('search_data'));
			$this -> data['all_categories'] = $this->product->search_category_shop($search_data,$this->data['city_id']);
			$this -> data['all_products']   = $this->product->search_shop_product($search_data,$this->data['city_id']);
			$this -> data['search_data'] = $search_data;
			$this -> data['page'] = 'search_result';
			$this->load->view('template', $this->data, FALSE);
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
