<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/city_model','city');
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this -> load -> model ('riceroom_admin/products_model', 'product');
		$this -> load -> model ('riceroom_admin/review_model', 'rating');

	}

	public function review()
	{
		if($user=$this -> session -> userdata('user')) :
  		 	$review_content = array(
				'name' => $this -> input -> post ('name'),
				'rating' => $this -> input -> post ('score'),
				'comments' => $this -> input -> post ('comment'),
				'user_id' => $user,
				'product_id' => $this -> input -> post ('product_id')	
			);
  			if(isset($_FILES['image']) && $_FILES['image']['error'] != '4'){
				$image = $this -> rating ->do_upload_image('image');
				print_r($image);
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
				}
				$review_content['image'] = $image;
			}
			$this -> rating -> insert($review_content);
			$this->session->set_flashdata('message', 'Your review form has been sucessfully Submitted.');
			redirect($this ->input->post ('curl'));
		else :
			redirect(site_url());	        
		endif;
	}
}