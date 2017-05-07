<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_Controller extends MY_Controller {

	public $data = array();
	
	public function __construct()
	{

		parent::__construct();
		//print_r($this->session->all_userdata()); var_dump($this->ion_auth->in_group("fourwheels")); exit;
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group("vendor"))
		{
			redirect('auth/login', 'refresh');
		}
		
		
	}	
	
}