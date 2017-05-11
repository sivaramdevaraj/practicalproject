<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('review_model', 'review');
		$this -> data['page'] = 'review';
	}

	public function index()
	{
		$this->db->order_by('last_updated','DESC');
		$this -> data['reviews'] = $this -> review ->get_all();
		$this -> data['mode'] = 'all';
		$this->load->view('template',$this -> data);
	}

	public function view($id='')
	{
		if($id = $this->uri->segment(4)){
			$this -> data['reviews'] = $this -> review_rating ->get($id);
			if(is_object($this -> data['reviews'])){
				$this -> data['mode'] = 'view';
				$this -> load -> view ('template', $this -> data);
			}
			else redirect(site_url(admin.'review_rating'));
		}
		else redirect(site_url(admin.'review_rating'));
	}

	public function delete($id='')
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{
			$this -> review -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'/'.'review');
		}
		else
			redirect(site_url().admin.'/'.'review');
	}
	public function status()
	{
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('abs_id');
	    $result = $this -> review_rating ->update ($id,$data);
		echo ($result) ? 1 : 0 ;
	}
}