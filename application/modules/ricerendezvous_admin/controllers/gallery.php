<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('gallery_model', 'gallery');
		$this -> load -> model('products_model','products');
		$this -> data['page'] = 'gallery.php';
	}

	public function index($id)
	{
		$this -> data['product'] = $this -> products -> get($id);
		$this -> data['gallery'] = $this -> gallery -> get_all('product_id',$id);
		$this->load->view('template',$this -> data);
	}

	public function add_edit()
	{
		$page = array(
			'product_id' => $this -> input -> post('product_id')
		);
		if(isset($_FILES['image']) && $_FILES['image']['error'] != '4'){
			$image = $this ->gallery->do_upload_image('image');
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
			}else
			{
				$old_image = $this -> input -> post ('old_image');
				if($old_image!='' && $old_image!=NULL && file_exists($this -> gallery ->original_path.'/gallery/'.$old_image)){
					unlink($this -> gallery ->original_path.'/gallery/'.$old_image);
				}
				if($old_image!='' && $old_image!=NULL && file_exists($this -> gallery ->original_path.'/gallery/thumbs/'.$old_image)){
					unlink($this -> gallery ->original_path.'/gallery/thumbs/'.$old_image);
				}
				$page['image'] = $image;					
			}
		}
		$id=$this ->input-> post ('id');
		if($id==''){
			$result = $this ->gallery-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->gallery-> update($id,$page);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}


	public function delete($id)
	{
		$product=$this -> gallery -> get($id);
         if($product->image!='' && file_exists('./uploads/gallery/'.$product->image))
            unlink($this -> gallery ->original_path.'/gallery/'.$product->image); 
            unlink($this -> gallery ->original_path.'/gallery/thumb/'.$product->image); 
		$this -> gallery -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(site_url().admin.'gallery/index/'.$product->product_id);
	}
	
	
	
}
