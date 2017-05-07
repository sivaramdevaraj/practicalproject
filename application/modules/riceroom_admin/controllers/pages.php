<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model','pages');
	}

	public function index($mode='')
	{	
		$data['pages'] 		= $this -> pages -> get_all();
		$data['page'] 		= 'pages';						
		$this->load->view('template', $data, FALSE);		
	}

	public function add_edit()
	{ 
		$page = array(
			'page_name' => $this ->input->post ('page_name'),
			'url_name' => $this ->input->post ('url_name'),			
			'name' => $this ->input->post ('name'),
			'previous' => $this ->input->post ('previous'),
			'description' => $this ->input->post ('description'),
			'other_column' => $this ->input->post ('other_column'),
			'image_size' => $this ->input->post ('image_size'),
			'add' => $this ->input->post ('add'),	
			'p_id' => $this ->input->post ('p_id')
		);
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
				if($old_image!='' && $old_image!=NULL && file_exists($this -> pages ->original_path.'/pages/thumbs/'.$old_image)){
					unlink($this -> pages ->original_path.'/pages/thumbs/'.$old_image);
				}
				$page['image'] = $image;					
			}
		}
				
		$id=$this ->input-> post ('id');
		if($this ->input-> post ('id')==''){
			$result = $this ->pages-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this ->pages-> update ($this -> input -> post ('id'),$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect(site_url().admin.'pages');
	}

	public function delete($id='')
	{
		$this -> pages -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(site_url().admin.'pages');
	}

}

/* End of file pages.php */
/* Location: ./application/modules/pv_admin/controllers/pages.php */