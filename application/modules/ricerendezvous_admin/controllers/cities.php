<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('country_model', 'countries');
		$this -> load -> model ('states_model', 'states');	
		$this -> load -> model ('city_model', 'cities');
		$this -> data['page'] = 'cities.php';
	}

	public function index($state_id)
	{
		if($state_id!='' && $this -> states -> count_all_results('id',$state_id)) :			
			$this -> data['state'] = $this -> states ->get($state_id);
			$this ->db->order_by('name','ASC');
			$this -> data['all_cities'] = $this -> cities -> get_all('state_id',$state_id);			
			$this->load->view('template',$this -> data);
		else:
			redirect(site_url().admin.'states');
		endif;
	}

	public function add_edit()
	{
		$page = array(
			'name' => $this ->input->post ('name'),
			'state_id' => $this ->input->post ('state_id')
		);
		$id=$this ->input-> post ('id');
		if($id==''){
			$result = $this ->cities-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->cities-> update($id,$page);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this ->input->post ('curl'));
	}

	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('ct_id');
	    $result = $this -> cities ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function delete()
	{
		$this -> cities -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
}
