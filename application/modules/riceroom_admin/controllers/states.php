<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('states_model', 'states');
		$this -> data['page'] = 'states.php';
	}

	public function index()
	{
		$this -> data['all_states'] = $this -> states -> get_all();			
		$this->load->view('template',$this -> data);
	}

	public function add_edit()
	{
		$page = array(
			'name' => $this ->input->post ('name')
		);
		$id=$this ->input-> post ('id');
		if($id==''){
			$result = $this ->states-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this->states-> update($id,$page);			
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this ->input->post ('curl'));
	}

	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('ct_id');
	    $result = $this -> states ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;	
	}

	public function delete()
	{
		$this -> states -> delete($this -> input -> post ('ct_id'));
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}
}
