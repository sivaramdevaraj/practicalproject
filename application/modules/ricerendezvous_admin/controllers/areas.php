<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('country_model', 'countries');
		$this -> load -> model ('states_model', 'states');	
		$this -> load -> model ('city_model', 'cities');	
		$this -> load -> model ('area_model', 'area');
		$this -> data['page'] = 'area.php';
	}

	public function index($city_id)
	{
		if($city_id!='' && $this -> cities -> count_all_results('id',$city_id)) :			
			$this -> data['cities'] = $this -> cities ->get($city_id);
			$this -> data['states'] = $this -> states ->get($this -> data['cities']->state_id);
			$this ->db->order_by('name','ASC');
			$this -> data['all_area'] = $this -> area -> get_all('city_id',$city_id);			
			$this->load->view('template',$this -> data);
		else:
			redirect(site_url().admin.'counry');
		endif;
	}

	public function add_edit()
	{
		$page = array(
			'name' => $this ->input->post ('name'),
			'city_id' => $this ->input->post ('city_id'),
			'pincode' => $this ->input->post ('pincode'),
			'delivery_charge' => $this ->input->post ('delivery_charge')
		);
		$id=$this ->input-> post ('id');
		if($id==''){
			$result = $this ->area-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->area-> update($id,$page);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this ->input->post ('curl'));
	}

	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('ct_id');
	    $result = $this -> area ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function delete()
	{
		$this -> area -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
}
