<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('categories_model', 'categories');
		$this -> load -> model('products_model','products');
		$this -> data['page'] = 'categories.php';
	}

	public function index()
	{
		$this->db->order_by("last_updated", "desc");
		$this -> data['all_categories'] = $this -> categories -> get_all('parent_id','0');
		$this -> data['page'] = 'categories';
		$this->load->view('template',$this -> data);
	}

	public function sub_index($p_id="")
	{
		$this -> data['categories_sub'] = $this -> cats -> get($p_id);
		$this -> data['categories'] = $this -> cats -> get_all('parent_id',$p_id);
		$this -> data['page'] = 'sub_categories';
		$this->load->view('template',$this -> data);
	}

	public function add_edit()
	{
		$page = array(
			'name' => $this ->input->post ('name'),
			'parent_id' => $this -> input -> post('parent_id')
		);
		if(isset($_FILES['image']) && $_FILES['image']['error'] != '4'){
			$image = $this ->categories->do_upload_image('image');
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
			}else
			{
				$old_image = $this -> input -> post ('old_image');
				if($old_image!='' && $old_image!=NULL && file_exists($this -> categories ->original_path.'/pages/'.$old_image)){
					unlink($this -> categories ->original_path.'/categories/'.$old_image);
				}
				if($old_image!='' && $old_image!=NULL && file_exists($this -> categories ->original_path.'/pages/thumbs/'.$old_image)){
					unlink($this -> categories ->original_path.'/categories/thumbs/'.$old_image);
				}
				$page['image'] = $image;					
			}
		}
		$id=$this ->input-> post ('id');
		if($id==''){
			$result = $this ->categories-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->categories-> update($id,$page);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}

	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('ct_id');
	    $result = $this -> categories ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function sub_category_ajax($cat_id)
	{
		$options = $this-> cats ->get_all(array('parent_id'=>$cat_id));
		$result = '<option value="" selected="selected">Select Sub categories</option>';
		foreach ($options as $key => $value) {
			$result.='<option value="'.$value->id.'">'.ucfirst($value->name).'</option>';
		}
		echo $result;		
	}

	public function delete_all()
	{
		//echo '<pre>'; print_r($_POST); exit;
		$cat_id=$this -> input -> post ('ct_id');
		$del_images = $this->products->get_all('cat_id',$cat_id);		
		foreach ($del_images as $key => $del) {
			unlink($this -> products ->original_path.'/products/'.$del->image);
			unlink($this -> products ->original_path.'/products/'.$del->description_image);
			$this->products->delete($del->id);
		 }
		$this -> categories -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

	public function sub_delete_all()
	{
		//echo '<pre>'; print_r($_POST); exit;
		$cat_id=$this -> input -> post ('ct_id');
		$del_images = $this->products->get_all('sub_cat_id',$cat_id);		
		foreach ($del_images as $key => $del) {
			unlink($this -> products ->original_path.'/products/'.$del->image);
			unlink($this -> products ->original_path.'/products/'.$del->description_image);
			$this->products->delete($del->id);
		 }
		$this -> categories -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
}
