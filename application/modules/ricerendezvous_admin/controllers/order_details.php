<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_details extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('order_details_model', 'order_details');
		$this ->  load->model('common_model','common_model');
		$this -> load -> model ('order_model', 'order');
		$this -> load -> model ('reg_user_model', 'reg_user');
        $this -> load->  model('city_model','cities');
		$this -> data['page'] = 'order_details.php';

	}

	public function index($category='')
	{		
		if($category!='')
		{    
			$this -> data['oprder_process']=$this->order->get_all('status',$category);	
			$this -> data['category'] = $category;			
			$this -> data['mode'] = 'all';
			$this->load->view('template', $this->data, FALSE);
		}		

	}

	public function order_list($o_id)
	{
		$this -> data['user_list']=$this -> order_details -> get_all('order_id',$o_id);
		$this -> data['order_list']=$this -> order -> get($o_id);				
		$this -> data['page'] = 'order_list';			
		$this -> data['mode'] = 'all';			
		$this->load->view('template', $this->data, FALSE);	
	}

	public function update_order_status($o_id)
	{   
		
		$status=$this -> input -> post ('ct_id');			
		$course = array( 'status' => $status);
	    $result = $this -> order -> update ($o_id,$course);		
		$user_email=$this-> order ->get($o_id);
		$data=array('user_email'=>$user_email);
		if($status==2) :	
			$message = $this -> load -> view('email/dispatch',$data,TRUE);
		elseif($status==3):
			$message = $this -> load -> view('email/delivery',$data,TRUE);
		elseif($status==4):
			$message = $this -> load -> view('email/canceled',$data,TRUE);					
		endif;
		if($status==2 ||$status==3 || $status==4) :			
			$this -> common_model -> send_mail('Riceroom',$user_email->email,'Your Riceroom order',$message);		
		endif;			
		
	}

	public function order_delete($id)
	{
		$this -> order -> delete($id);
		$this -> order_details -> delete('order_id',$id);
		$this->session->set_flashdata('message', 'Successfully Deleted');

	}

	public function report_table($id)
	{
		$product_list = $this-> order_details -> get_all('order_id',$id);			
		$order_details = $this-> order -> get($id);			
		$data = array('product_list' =>$product_list,'order_details' =>$order_details);
        $order_product = $this -> load -> view('table/product_list',$data,TRUE);
		echo $order_product;
	}

	public function order_packed()
	{
		$order_pack = array(
			'status' => $this ->input->post ('status'),
			'delivery_date' => date('Y-m-d',strtotime($this ->input->post ('delivery_date'))),
			'shipment_track' => $this ->input->post ('shipment_track'),
			'courier' => $this ->input->post ('courier'),
			'dispatched' => now()
		);
		$id=$this ->input-> post ('orders_id');
		$this -> order -> update ($id,$order_pack);			
		$this->data['result'] = $this->order->get($id);		
		$message = $this -> load -> view('email/delivery',$this->data,TRUE);
		$this -> common_model -> send_mail('Riceroom',$this->data['result']->email,'Your Riceroom order status',$message);		
		$this->session->set_flashdata('message', 'Successfully Updated');
		redirect($this -> input -> post('curl'));
		
	}

	public function invoice_model($id)
	{
		$this->data['product_list'] = $this-> order_details -> get_all('order_id',$id);		
		$this->data['product'] = $this-> order -> get($id);
		$this->data['user_info'] = $this-> reg_user -> get($this->data['product']->user_id);
        $invoice_product = $this -> load -> view('table/invoice_model',$this->data,TRUE);
		echo $invoice_product;
	}
	
}
