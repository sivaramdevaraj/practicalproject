<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Countries extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('country_name_model', 'countries');
		$this -> data['page'] = 'countries.php';
	}

	public function index()
	{
		$this ->db->order_by('name','DESC');
		$this -> data['all_countries'] = $this -> countries -> get_all();
		$this -> data['page'] = 'countries';
		$this->load->view('template',$this -> data);
	}

	public function add_edit()
	{
		$page = array(
			'name' => $this ->input->post ('name')
		);
		if($id=$this ->input-> post ('id')==''){
			$result = $this ->countries-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->countries-> update ($id,$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect(site_url().admin.'countries');
	}

	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('ct_id');
	    $result = $this -> countries ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function delete()
	{
		$this -> countries -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
}
