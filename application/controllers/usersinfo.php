<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usersinfo extends User_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('common_model','common_model');
		$this -> load -> model('users_model', 'users');
		$this -> load -> model('referral_code_model', 'referral_code');  
        $this -> load -> model ('ricerendezvous_admin/order_model', 'order');
		$this -> load -> model ('ricerendezvous_admin/products_model', 'product');
		$this -> load -> model ('ricerendezvous_admin/order_details_model', 'order_details');

	}	
 	
 	public function user_login()
	{
   		$login = array(
			'email'=> $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		);
	   	if($this -> users->count_all_results($login)) :
   			$user = $this -> users -> get($login);
   			if($user->status!="0"):
				$this->session->set_userdata('user', $user->id);
				echo 2;
			else :
				echo 1;
			endif;	   	
	   	else :
	   		echo 0;
	   	endif;	   		
	}

	public function loginemail_check()
    {
      if($_POST['email']!='')
      {
         $checkname = array('email'=> $this -> input -> post('email'));
         if($this -> users->count_all_results($checkname))
         {  
         	echo 1;
         }
      }  
         else echo 0;
    }

    public function loginnumber_check()
    {
      if($_POST['phone']!='')
      {
         $checkname = array('phone'=> $this -> input -> post('phone'));
         if($this -> users->count_all_results($checkname))
         {  
         	echo 1;
         }
      }  
         else echo 0;
    }

    

   	public function user_registration()
	{ 
		if($_POST['email']!='')
        {
	   		$user_content = array(
	   			'name' => 	$this -> input -> post('name'),
				'phone' => 	$this -> input -> post('phone'),
				'email' => 	$this -> input -> post('email'),
				'password' => md5($this -> input -> post ('password'))
			);   		
			$user_id = $this -> users -> insert($user_content);
			$min=1000001; $max=10000001; $code=rand($min,$max);
      		$referalcode=$this->check_code_number($code); 
      		$referal_data=array(
      			'user_id'  => $user_id,				
				'code' => $referalcode
      			);  
			$this-> referral_code ->insert($referal_data); 
	        $user = $this -> users -> get($user_id);
	        $data = array('user'=>$user,'referalcode'=>$referalcode);
	        $message = $this -> load -> view('email/register_reply',$data,TRUE); 	        
	        $this -> common_model -> send_mail(admin_email,$user->email,'Welcome to Rice Rendezvous',$message);
			$this->session->set_userdata('user',$user->id);
			redirect($this -> input -> post('curl'));
	    }
	    else redirect(site_url());
	}

	public function forgot_password()
   	{
      extract($_POST);      
      $email=$this -> input -> post('f_email');
      if($this -> users->count_all_results('email',$email)):
			$user = $this -> users -> get('email',$email);
			$user_id=$user->id;
			$active_code=md5(uniqid(rand(), true));
			$this -> users -> update($user_id,array('hash'=>$active_code));
			$link = site_url('usersinfo/reset_password').'/'.$user_id.'/'.$active_code; 
			$order = array('name' => $user->name,'email' => $user->email,'link' => $link);
			$message = $this -> load -> view('email/forgot_email',$order,TRUE);
			$this -> common_model -> send_mail(admin_email,$user->email,'Forgot Password',$message);
			$this->session->set_flashdata('message', 'Your new password has been emailed to you. Please check and login');
			echo 1;
      else : 
         	echo 0;
      endif;
   	}

	public function reset_password($x='',$y='')
	{
		if($x!='' && $y!='' && $this -> users->count_all_results(array('id'=>$x,'hash'=>$y))):
			$this->data['user_info']=$this-> users ->get($x);					
			$this->data['page'] = 'reset_password';
			$this -> load -> view('template',$this->data);
		else :
			show_404();
			$this -> load -> view('template',$this->data);
		endif;
	}

	public function password_change()
    {
	    extract($_POST);
	    $user_id=$this -> input -> post('user_id');    
	    $this -> users->count_all_results('id',$user_id);
        if($this -> users->count_all_results('id',$user_id)) :
	         $pwd = array('password'=>md5($password),'hash'=>''); 
	         $this -> users -> update($user_id,$pwd);
	         $this->session->set_flashdata('message', 'Your password has been changed sucessfully'); 
	         redirect(site_url());
	    else :
	         $this->session->set_flashdata('error', 'Sorry! try again');     
	         redirect(site_url());
	    endif;
   
    }

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(site_url());
	}

	public function edit_profile()	
	{
		if($user=$this -> session -> userdata('user')) :
			$this->data['user_details']= $this->users->get($user);
			$this->data['page'] = 'edit_profile';
			$this->load->view('template', $this->data, FALSE);
		else :
			redirect(site_url()); 
		endif;
	}

	public function change_password()	
	{
		if($user=$this -> session -> userdata('user')) :
			$this->data['user_details']= $this->users->get($user);
			$this->data['page'] = 'change_pass';
			$this->load->view('template', $this->data, FALSE);
		else :
			redirect(site_url()); 
		endif;
	}

	public function new_password()
    {
    	//print_r($_POST); exit;
    	if($user=$this -> session -> userdata('user')) :
    		$this -> data['users'] = $this->users->get($user);
	         extract($_POST);
	         $oldpass =md5($old_passwords);
	         $id = $this -> data['users']->id;
	         if($old_passwords!='' && $this -> users -> count_all_results(array('id'=>$id,'password'=>$oldpass))) :
	         	if($old_passwords!=$chpassword):
		         	 $new_pass=array('password'=>md5($chpassword));
		         	 $this->users->update($id,$new_pass);
		         	 $this->session->set_flashdata('message', 'Your password has been changed sucessfully.');
				else:
					 $this->session->set_flashdata('error', 'Password change failed. New Password same as the old password.');
				endif;
	         	 echo 1;
	         else : echo 0; endif;
		else : echo 0; endif;
	}

	public function orders()	
	{
		if($user=$this -> session -> userdata('user')) :
			$this->data['order_details']= $this->order->get_all('user_id',$user);
			$this->data['page'] = 'order_details';
			$this->load->view('template', $this->data, FALSE);
		else :
			redirect(site_url()); 
		endif;
	}

	public function orders_list($order_id)
    {  	
  	if($this->session->userdata('user')!="") :
  		$user_id=$this->session->userdata('user');
  		if($order_id!='' && $this -> order_details -> count_all_results('order_id',$order_id)) :
	  		 $this->data['order_details']=$this-> order_details ->get_all('order_id',$order_id);
	  		 $this->data['order_id']=$this-> order ->get($order_id);
			 $this->data['page']='order_history';
	         $this -> load -> view('template',$this->data);
        else :
          show_404();
        endif;
	else :
		redirect(site_url());
        $this -> load -> view('template',$this->data);
	endif;
	
    }

	public function change_profile_information()
	{
	  if($user=$this -> session -> userdata('user')) :
		if($_POST['phone']!='') :
			$user_content = array(
		   			'name' => 	$this -> input -> post('name'),
					'phone' => 	$this -> input -> post('phone')
			);
			$this->users->update($user,$user_content);
			$this->session->set_flashdata('message', 'Your Profile information sucessfully updated.');
			redirect($this -> input -> post('curl'));
	    else :
	    	redirect(site_url()); 
	    endif; 
	  else :
		redirect(site_url());
	  endif;
	}

	public function check_code_number($code)
	{
	    if($this -> referral_code->count_all_results('code',$code))
	    {
	      echo $code1 = $code+1;
	      $this -> check_ordernumber($code1);
	    }
	    else return $code;
	}

	public function cancel_order()
 	{ 		
		if($this->session->userdata('user')!="") :  		
			$user=$this->session->userdata('user');
			extract($_POST);		
			$canceled = array('cancel_msg' => $this -> input -> post ('cancel_reason'),'status' => '4');		
			if($this -> order -> count_all_results('id',$order_id)) :				
				$order=$this->order->get('id',$order_id);
				$order_info=$this->order_details->get_all('order_id',$order_id);
			    foreach ($order_info as $key => $change_qty) {
			    	$product_info = $this->product->get('id',$change_qty->product_id);
			    	$qty_up = array('qty'=>$product_info->qty+$change_qty->qty);
					$this -> product -> update ($product_info->id,$qty_up);
			    }
				$result = $this -> order -> update ($order->id,$canceled);				
				$message = $this -> load -> view('ricerendezvous_admin/email/canceled',$data,TRUE);
				$this -> common_model -> send_mail('Your RiceRendezvous order status',$user_email->email,'RiceRendezvous order cancellation',$message);				
				$this->session->set_flashdata('message', 'Your order has been cancelled sucessfully.');
				redirect(site_url('usersinfo/orders')); 
			else :			
				echo 'Product mismatch';				
			endif;
			echo 0;	  	  
		else :
			redirect(site_url());	        
		endif;
 	}



}