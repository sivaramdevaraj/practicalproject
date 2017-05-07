<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in() ||!$this->ion_auth->in_group("admin"))
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this -> load -> model ('categories_model', 'cats');
		
	}
	
}