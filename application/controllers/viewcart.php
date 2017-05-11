<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewcart extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('ricerendezvous_admin/categories_model', 'cats');
		$this -> load -> model ('ricerendezvous_admin/products_model', 'product');
	}

	public function index()
	{
		if($user=$this -> session -> userdata('user')) :
			$this->data['page'] = 'view_cart';
			$this->load->view('template', $this->data, FALSE);
		else :
			$this->session->set_flashdata('login_pop', 'Login pop up');
			redirect(site_url('rice/shop_now'));
		endif;
	}

}

/* End of file viewcart.php */
/* Location: ./application/controllers/viewcart.php */
