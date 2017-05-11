<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place_order extends User_Controller {

	public function __construct()
	{
    parent::__construct();
    $this -> load -> model('users_model', 'users');   
    $this -> load -> model('referral_amount_model', 'referral_amount');   
    $this -> load -> model('referral_code_model', 'referral_code');   
    $this -> load -> model('common_model','common_model');
    $this -> load -> model ('ricerendezvous_admin/products_model', 'products');
    $this -> load -> model ('ricerendezvous_admin/area_model', 'pincode');
    $this -> load -> model ('ricerendezvous_admin/categories_model', 'cats');
    $this -> load -> model ('ricerendezvous_admin/products_model', 'product');
    $this -> load -> model ('ricerendezvous_admin/order_details_model', 'order_details');
    $this -> load -> model ('ricerendezvous_admin/order_model', 'order');
	}

  public function shipping()
  {
    extract($_POST); 
    if($user_details=$this -> session -> userdata('user'))
    {
      $rguser_details = $this ->users->get($user_details);
      $get_pincode = $this -> pincode ->get('pincode',$shipping_postcode);
      if($discount=$this -> session -> userdata('discount_amount')):
      else:
        $discount =0;
      endif;
      $min=1000001; $max=10000001; $ordrno=rand($min,$max);
      $order_number=$this->check_ordernumber($ordrno);
      $order_content = array(
        'user_id'      => $rguser_details ->id,
        'name'         => $name,
        'email'        => $rguser_details ->email,
        'total_no_products' => $this->cart->total_items(),
        'grand_total' => $this->cart->total() + $get_pincode->delivery_charge - $discount,
        'discount_amount' => $discount,
        'shipping_address'     => $shipping_address,
        'shipping_phone'     => $shipping_phone,
        'shipping_city'     => $shipping_city,
        'shipping_postcode'     => $shipping_postcode,
        'shipping_state'     => 'Victoria',
        'payment_type'     => $payment_type,
        'order_number'      => $order_number,
        'delivery_charge'     => $get_pincode->delivery_charge,
        'order_date'      => date('Y-m-d H:i:s')  
      );
      
      $last_id=$this -> order -> insert($order_content);
      $order_items = array();
          foreach ($this->cart->contents() as $items): 
            $order_items= array(
              'order_id' => $last_id,
              'product_id' => $items['id'],
              'qty' => $items['qty'],
              'price' => $items['price'],
              'product_name' => $items['name'],
              'subtotal'=>$items['subtotal'] 
            );
            $this -> order_details -> insert($order_items); 
            $product_value = $this -> products -> get($items['id']); 
            $this -> products -> update($items['id'],array('qty'=>$product_value->qty-$items['qty']));         
          endforeach;
         $this->cart->destroy();
         $this->session->unset_userdata('discount_amount');
         $this ->order_mail($last_id);                
      if($payment_type=='cod'):
      {
        $this->session->set_flashdata('message', 'Your Order placed succesfully.');
        redirect(site_url().'usersinfo/orders/');
      }
      else:
        $this->session->set_flashdata('message', 'Your Order placed succesfully.');
        redirect(site_url().'usersinfo/orders/');
      endif;
    }

  }

  public function check_ordernumber($order_no)
  {
    if($this -> order->count_all_results('order_number',$order_no))
    {
      echo $order_no1 = $order_no+1;
      $this -> check_ordernumber($order_no1);
    }
    else return $order_no;
  }

  public function order_mail($last_id)
  {
    $this->data['orders'] = $this -> order -> get($last_id);
    $this->data['orderlist'] = $this -> order_details -> get_all('order_id',$last_id);
    $message = $this -> load -> view('email/order_details',$this->data,TRUE);
    $this->session->set_flashdata('message', 'You have sucessfully ordered'); 
    $email_result = $this -> common_model -> send_mail('RiceRendezvous',$this->data['orders']->email,'Your order on RiceRendezvous (#'.$this->data['orders']->order_number.')',$message);   
  }

 
 }