<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whole_sales extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this -> load->model('categories_model','cats');
		$this -> load->model('products_model','products');
		$this -> load -> model ('city_model', 'cities');
		$this -> data['page'] = 'whole_sales';
	}

	public function index()
	{	
		$this-> data['products']=$this -> products ->whole_sale_product_all();
		$this -> data['mode'] = 'all';
		$this-> load -> view('template', $this->data);			
	}	

	public function add()
	{	
		$this -> data['category'] = $this -> cats -> custom_dropdown('id','name',array('parent_id'=>0));
		$this -> data['cities'] = $this -> cities -> custom_dropdown('id','name',array('id'=>'1'));
		$this -> data['mode'] = 'add';
		$this-> load -> view('template', $this->data);	
	}

	public function edit($p_id='')
	{	
		$this->data['products']=$this-> products ->get('id',$p_id);
		$this -> data['mode'] = 'edit';
		$this-> load -> view('template', $this->data);
	}

	public function view($p_id='')
	{	
		$this->data['product']=$this-> products ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this-> load -> view('template', $this->data);		
	}

	public function add_edit_product()
	{	
		$product_details = array(
			'cat_id' => $this -> input -> post ('cat_id'),
			'sub_cat_id' => $this -> input -> post ('sub_cat_id'),
			'city_id' => $this -> input -> post ('city_id'),
			'product_type' => $this -> input -> post ('product_type'),
			'weight' => $this -> input -> post ('weight'),
			'qty' => $this -> input -> post ('qty'),
			'sku_id' => $this -> input -> post ('sku_id'),
			'whole_sale' => '1',
			'ws_first_rang_price' => $this -> input -> post ('ws_first_rang_price'),
			'ws_second_rang_price' => $this -> input -> post ('ws_second_rang_price'),
			'ws_third_rang_price' => $this -> input -> post ('ws_third_rang_price'),
			'ws_more_rang_price' => $this -> input -> post ('ws_more_rang_price')
			);
		if(isset($_FILES['image']) && $_FILES['image']['error'] != '4'){
			$image = $this ->products->do_upload_image('image','100','100');
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
			}else
			{
				$old_image = $this -> input -> post ('old_image');
				if($old_image!='' && $old_image!=NULL && file_exists($this -> products ->original_path.'/products/'.$old_image)){
					unlink($this -> products ->original_path.'/products/'.$old_image);
				}
				if($old_image!='' && $old_image!=NULL && file_exists($this -> products ->original_path.'/products/thumb/'.$old_image)){
					unlink($this -> products ->original_path.'/products/thumb/'.$old_image);
				}
				$product_details['image'] = $image;					
			}
		}

		$id=$this ->input-> post ('id');
		if($id=='')
		{
			$result = $this ->products-> insert ($product_details);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else
		{
			$result = $this->products-> update($id,$product_details);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}


	

	public function active_status()
	{		
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('abs_id');
	    $result = $this -> products ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;
	}

	public function delete($id)
	{
		$product=$this -> products -> get($id);
         if($product->image!='' && file_exists('./uploads/products/'.$product->image))
            unlink($this -> products ->original_path.'/products/'.$product->image); 
            unlink($this -> products ->original_path.'/products/thumb/'.$product->image); 
		$this -> products -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}


	

}