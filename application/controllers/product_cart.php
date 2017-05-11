<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_cart extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load->model('common_model','common_model');
		$this -> load -> model ('ricerendezvous_admin/categories_model', 'cats');
		$this -> load -> model ('ricerendezvous_admin/products_model', 'product');
	}

	public function add_cart_data()
	{
		extract($_GET);
		$product_info=$this->product->get($p_id);
		if($product_info->whole_sale!="0"):
			if(('10'<= $qty) && ($qty <='20')):
			$final_cost=$product_info->ws_first_rang_price;
			elseif(('20'<= $qty) && ($qty <='30')) :
				$final_cost=$product_info->ws_second_rang_price;
			elseif(('30'<= $qty) && ($qty <='40')) :
				$final_cost=$product_info->ws_third_rang_price;
			elseif(('40'<= $qty)):
				$final_cost=$product_info->ws_more_rang_price;
			endif;
		else:
			$final_cost=$product_info->price;
		endif;		
		$cart='';
		$data = array(             
                'id'              => $product_info->id,
                'qty'             => $qty,
                'price'           => $final_cost,
                'name'            => $title, 
                'weight'          => $product_info->weight,                  
                'image'           => $product_info->image,
              );
		
        $this->cart->insert($data);
       	$this->data['cart_content']= $this->cart->contents();
        $cart_total= count($this->cart->contents());
       	$pro=$this->load->view('ajax/ajax_cart_change', $this->data,TRUE);
       	$cart=$this->load->view('ajax/ajax_view_cart_change', $this->data,TRUE);
		$array = array('pro' => $pro,'cart' => $cart,'cart_total' => $cart_total);
		$result = json_encode($array);
		echo $result;
	}

	public function add_cart_delete()
	{
		extract($_GET);	
       	$cart_product= $this->cart->contents();
       	foreach ($cart_product as $item) {
            if ($item['id']==$p_id) {
                $data = array( 'rowid' => $item['rowid'],
							   'qty' =>'0'
				);
                $this->cart->update($data);
            }
        }
        $this->data['cart_content']= $this->cart->contents();
        $cart_total= count($this->cart->contents());
       	$pro=$this->load->view('ajax/ajax_cart_change', $this->data,TRUE);
		$cart=$this->load->view('ajax/ajax_view_cart_change', $this->data,TRUE);
		$array = array('pro' => $pro,'cart' => $cart,'cart_total' => $cart_total);
		$result = json_encode($array);
		echo $result;
	}

	public function add_cart_update()
	{
		extract($_GET);
		$product_info=$this->product->get($p_id);
		if($product_info->whole_sale!="0"):
			if(('10'<= $qty) && ($qty <='20')):
			$final_cost=$product_info->ws_first_rang_price;
			elseif(('20'<= $qty) && ($qty <='30')) :
				$final_cost=$product_info->ws_second_rang_price;
			elseif(('30'<= $qty) && ($qty <='40')) :
				$final_cost=$product_info->ws_third_rang_price;
			elseif(('40'<= $qty)):
				$final_cost=$product_info->ws_more_rang_price;
			endif;
		else:
			$final_cost=$product_info->price;
		endif;	
       	$cart_product= $this->cart->contents();
       	foreach ($cart_product as $item) {
            if ($item['id']==$p_id) {
                $data = array( 'rowid' => $item['rowid'],
							   'qty' =>$qty,
							   'price' =>$final_cost
				);
                $this->cart->update($data);
            }
        }
        $this->data['cart_content']= $this->cart->contents();
        $cart_total= count($this->cart->contents());
       	$pro=$this->load->view('ajax/ajax_cart_change', $this->data,TRUE);
		$cart=$this->load->view('ajax/ajax_view_cart_change', $this->data,TRUE);
		$array = array('pro' => $pro,'cart' => $cart,'cart_total' => $cart_total);
		$result = json_encode($array);
		echo $result;
	}

	public function add_cart_data_ws()
	{
		extract($_POST);
		$product_info=$this->product->get($p_id);
		if(('10'<= $qty) && ($qty <='20')):
			$final_cost=$product_info->ws_first_rang_price;
		elseif(('20'<= $qty) && ($qty <='30')) :
			$final_cost=$product_info->ws_second_rang_price;
		elseif(('30'<= $qty) && ($qty <='40')) :
			$final_cost=$product_info->ws_third_rang_price;
		elseif(('40'<= $qty)):
			$final_cost=$product_info->ws_more_rang_price;
		endif;		


		$cart='';
		$data = array(             
                'id'              => $product_info->id,
                'qty'             => $qty,
                'price'           => $final_cost,
                'name'            => $title, 
                'weight'          => $product_info->weight,                  
                'image'           => $product_info->image,
              );
		
        $this->cart->insert($data);
       	$this->data['cart_content']= $this->cart->contents();
        $cart_total= count($this->cart->contents());
       	$pro=$this->load->view('ajax/ajax_cart_change', $this->data,TRUE);
		$cart=$this->load->view('ajax/ajax_view_cart_change', $this->data,TRUE);
		$array = array('pro' => $pro,'cart' => $cart,'cart_total' => $cart_total);
		$result = json_encode($array);
		echo $result;
	}



	public function add_cart_update_ws()
	{
		extract($_POST);
		$product_info=$this->product->get($p_id);
		if(('10'<= $qty) && ($qty <='20')):
			$final_cost=$product_info->ws_first_rang_price;
		elseif(('20'<= $qty) && ($qty <='30')) :
			$final_cost=$product_info->ws_second_rang_price;
		elseif(('30'<= $qty) && ($qty <='40')) :
			$final_cost=$product_info->ws_third_rang_price;
		elseif(('40'<= $qty)):
			$final_cost=$product_info->ws_more_rang_price;
		endif;	
       	$cart_product= $this->cart->contents();
       	foreach ($cart_product as $item) {
            if ($item['id']==$p_id) {
                $data = array( 'rowid' => $item['rowid'],                			   
							   'qty' =>$qty,
							   'price' =>$final_cost
							   
				);
                $this->cart->update($data);
            }
        }
        $this->data['cart_content']= $this->cart->contents();
        $cart_total= count($this->cart->contents());
       	$pro=$this->load->view('ajax/ajax_cart_change', $this->data,TRUE);
		$cart=$this->load->view('ajax/ajax_view_cart_change', $this->data,TRUE);
		$array = array('pro' => $pro,'cart' => $cart,'cart_total' => $cart_total);
		$result = json_encode($array);
		echo $result;
	}


	
}

