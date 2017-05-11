<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model','pages');
		$this->load->model('contents_model','contents');
	}

	public function index($name='',$p_id='')
	{
		$this -> data['p_page'] = $parent_page = ($p_id!='')? $this -> contents -> get($p_id): '';
		$p_id = (is_object($parent_page))? $p_id : '';
		$this -> data['parent_de'] = $parent_de = ($p_id!='') ? $this -> pages -> get($parent_page->page_id) : '';
		$p_id = (is_object($parent_de) && $parent_de->p_id)? $p_id : '';
		if($this -> pages -> count_all_results(array('url_name'=>$name))):
			$this -> data['cms'] 		= $this -> pages -> get(array('url_name'=>$name));
			$this -> data['contents'] 	= $this -> contents -> get_all(array('page_id'=>$this->data['cms']->id,'p_id'=>$p_id));
			$this -> data['page'] 		= 'contents';
			$this -> data['p_id'] 		= ($p_id!='')? $p_id : FALSE;
			//echo '<pre>'.$this ->db ->last_query();print_r($this -> data);exit();
			$this->load->view('template',$this -> data);
		else:
			$this->output->set_status_header('404');
  			show_404();
  	
		endif;
	}

	public function add_edit()
	{ 
		//print_r($_POST); exit();
		$page = array();
		if($this ->input->post ('name'))		$page['name'] 			= $this ->input->post ('name');
		if($this ->input->post ('page_id'))		$page['page_id'] 		= $this ->input->post ('page_id');
		if($this ->input->post ('p_id'))		$page['p_id'] 			= $this ->input->post ('p_id');
		if($this ->input->post ('description'))	$page['description'] 	= $this ->input->post ('description');
		if($this ->input->post ('other_column'))$page['other_column'] 	= $this ->input->post ('other_column');
		
		if(isset($_FILES['image']) && $_FILES['image']['error'] != '4'){
			$image = $this ->pages->do_upload_image('image');
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
			}else
			{
				$old_image = $this -> input -> post ('old_image');
				if($old_image!='' && $old_image!=NULL && file_exists($this -> pages ->original_path.'/pages/'.$old_image)){
					unlink($this -> pages ->original_path.'/pages/'.$old_image);
				}
				$page['image'] = $image;
				
			}
		}
		$id=$this ->input-> post ('id');
		if(empty($id)){	
			$result = $this ->contents-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this ->contents-> update ($this -> input -> post ('id'),$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		//echo $this -> db -> last_query();exit();
		redirect($this -> input -> post('curl'));
	}
	
	public function delete($id,$image='')
	{
		$old_image = $image;
		if($old_image!='' && $old_image!=NULL && file_exists($this -> pages ->original_path.'/pages/'.$old_image))
			unlink($this -> pages ->original_path.'/pages/'.$old_image);
		$this -> contents -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
	public function home()
	{
		$this -> data['today_orders']=$this->order->today_orders();
		$this -> data['page']= 'welcome';
		// echo '<pre>'; print_r($this -> data['today_orders']); exit;
		$this->load->view('template',$this -> data);
	}

}

/* End of file Cms_admin.php */
/* Location: ./application/modules/navir_admin/controllers/navir_admin.php */