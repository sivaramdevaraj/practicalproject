<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('users_model', 'users');		
		$this -> load -> model('referral_amount_model', 'referral_amount');		
		$this -> load -> model('referral_code_model', 'referral_code');		
		$this -> load -> model('common_model','common_model');
		$this -> load -> model ('ricerendezvous_admin/area_model', 'pincode');
		$this -> load -> model ('ricerendezvous_admin/categories_model', 'cats');
		$this -> load -> model ('ricerendezvous_admin/products_model', 'product');
	}

	public function index()
	{
		if($user=$this -> session -> userdata('user')) :
			$this->data['user_info'] = $this ->users->get($user);
			$city_id=$this->input->cookie('city_id', TRUE);
		    $this->data['city_info'] = $this ->city->get($city_id); 
			$this->data['page'] = 'address_detail';
			$this->load->view('template', $this->data, FALSE);
		else :
			$this->session->set_flashdata('login_pop', 'Login pop up');
			redirect(site_url('rice/shop_now'));
		endif;
	}

	public function check_postcode_available()
	{
		extract($_POST);
		if($postcode!='')
		{
			if($this -> pincode ->count_all_results('pincode',$postcode))
			{
				$display_message="success";
				$this-> data['pincode_values'] = $this -> pincode -> get('pincode',$postcode);
				$prod=$this-> load -> view('ajax/delivery_charge', $this->data, TRUE);
				$array = array('message'=>$display_message,'pro' => $prod);
				$result = json_encode($array);
				echo $result;  
			}
			else
			{
				$display_message="failed";
				$prods=$this-> load -> view('ajax/nopincode_delivery_charge', $this->data, TRUE);       
				$array = array('message'=>$display_message,'pros' => $prods);
				$result = json_encode($array);
				echo $result;  
			}
		}
	}

	public function check_referal_available()
	{
		extract($_POST);
		if($ref_code!='')
		{
			if($postcode!="" && $this -> pincode ->count_all_results('pincode',$postcode))
			{
				$display_message="success";
				$this-> data['pincode_values'] = $this -> pincode -> get('pincode',$postcode);
				$prod=$this-> load -> view('ajax/delivery_charge', $this->data, TRUE);
				 
			}
			else
			{
				$display_message="failed";
				$prods=$this-> load -> view('ajax/nopincode_delivery_charge', $this->data, TRUE);     
				  
			}

			if($this -> referral_code ->count_all_results(array('code'=>$ref_code,'status'=>'0')))
			{
				$code_status="success";
				$referral_code = $this -> referral_code -> get(array('code'=>$ref_code,'status'=>'0'));
				$this->referral_code->update($referral_code->id,array('status'=>'1'));
				$discount_amount = $this -> referral_amount -> get('1');
				$this->session->set_userdata('discount_amount',$discount_amount->amount);
			}

			else
			{
				$code_status="failed";
			}

			$array = array('message'=>$display_message,'code_status'=>$code_status,'pros' => @$prods,'prod' => @$prod);
			$result = json_encode($array);
			echo $result;
		}
	}


	
}

/* End of file viewcart.php */
/* Location: ./application/controllers/viewcart.php */
