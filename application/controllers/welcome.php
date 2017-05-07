<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('riceroom_admin/city_model','city');
		$this -> load -> model ('riceroom_admin/categories_model', 'cats');
		$this -> load -> model ('riceroom_admin/products_model', 'product');
		$this -> load -> model ('riceroom_admin/review_model', 'rating');
	}

	public function index()
	{
	    $this->data['cities'] = $this->city->custom_dropdown('id','name',array('state_id'=>'1'));
		$this->data['page'] = 'index';
		$this->load->view('template', $this->data, FALSE);
	}

	public function set_city_cookie()
	{
	   extract($_POST);
	   $this->load->helper('cookie');     
	   $cookie = array(
                    'name'   => 'city_id',
                    'value'  => $city_id,
                    'expire' => time()+86500,
                    'secure' => false
                );
        $this->input->set_cookie($cookie);
	    $this->cart->destroy();
	    redirect(site_url());
	}

	public function product()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'product';
		$this->load->view('template', $this->data, FALSE);
	}

	public function view_product()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'view_product';
		$this->load->view('template', $this->data, FALSE);
	}
	public function view_cart()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'view_cart';
		$this->load->view('template', $this->data, FALSE);
	}
	public function checkout()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'checkout';
		$this->load->view('template', $this->data, FALSE);
	}
	public function wholesale_zone()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'wholesale_zone';
		$this->load->view('template', $this->data, FALSE);
	}
	public function shop_now()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'shop_now';
		$this->load->view('template', $this->data, FALSE);
	}
	public function search_product()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'search_product';
		$this->load->view('template', $this->data, FALSE);
	}
	

    public function reset_password()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'reset_password';
		$this->load->view('template', $this->data, FALSE);
	}
	public function contact_us()
	{
	  //  echo 'welcome'; exit;
		$this->data['page'] = 'contact_us';
		$this->load->view('template', $this->data, FALSE);
	}
	public function customer_speak()
	{
		$this->data['rating'] = $this-> rating ->get_all();
		//echo '<pre>'; print_r($this->data['rating']); exit;
		$this->data['page'] = 'customer_speak';
		$this->load->view('template', $this->data, FALSE);
	}

	public function change_product_price()
	{
		extract($_GET);
		$check_data = array('group_id'=>$group_id,'weight'=>$weight);
		$this -> data['products'] = $this -> product -> get($check_data);
		if(is_object($this -> data['products'])) :
			$errors = '0';
			$pro=$this->load->view('ajax/ajax_price_change', $this->data,TRUE);
			$array = array('pro' => $pro,'errors' => $errors);
		else:
			if($weight=='25') : $wei='10kg'; else : $wei='25kg'; endif;
			$errors = '1';
			$array = array('errors' => $errors,'weight'=>$wei);			
		endif;
		$result = json_encode($array);
		echo $result;
	}

	public function change_view_product_price()
	{
		extract($_GET);
		$check_data = array('group_id'=>$group_id,'weight'=>$weight);
		$products= $this -> product -> get($check_data);
		$url=site_url().'p/'.$products->sku_id;
		$array = array('pro' => $url);
		$result = json_encode($array);
		echo $result;
	}

	public function change_sale_price()
	{
		extract($_POST);
		$this -> data['products'] = $this -> product -> get($p_id);
		$pro=$this->load->view('ajax/ajax_sale_price_change', $this->data,TRUE);
		$array = array('pro' => $pro);
		$result = json_encode($array);
		echo $result;
	}
		
	public function aboutus()
	{
		$this->data['page'] = 'aboutus';
		$this->load->view('template', $this->data, FALSE);
	}

	public function terms_condition()
	{
		$this->data['page'] = 'terms_condition';
		$this->load->view('template', $this->data, FALSE);
	}

	public function return_policy()
	{
		$this->data['page'] = 'return_policy';
		$this->load->view('template', $this->data, FALSE);
	}

	public function cancellation()
	{
		$this->data['page'] = 'cancellation';
		$this->load->view('template', $this->data, FALSE);
	}
	
	public function privacy_policy()
	{
		$this->data['page'] = 'privacy_policy';
		$this->load->view('template', $this->data, FALSE);
	}

	public function contact_form()
	{
		if($_POST!=""):
			$data=$_POST;
			$message = $this -> load -> view('email/contact_form',$data,TRUE);
			$message_customer = $this -> load -> view('email/contact_customer',$data,TRUE);
			$email_result = $this -> common_model -> send_mail('info@pacificit.in','anushree@webdesignpis.com','New Contact form',$message);
			$email_result_customer = $this -> common_model -> send_mail('info@pacificit.in',$data['email'],'Rice room',$message_customer);
			$this->session->set_flashdata('message', 'Successfully Submitted.We will get back to you');
			redirect(site_url().'welcome/contact_us');
		else:
			$this->session->set_flashdata('message', 'Your Contact form is not successfully submitted!');
			redirect(site_url().'welcome/contact_us');
		endif;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
