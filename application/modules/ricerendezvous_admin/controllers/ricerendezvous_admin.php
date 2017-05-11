<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ricerendezvous_admin extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this-> data['page'] = 'welcome';
		$this ->load->view('template',$this -> data); 
	}
	
}

/* End of file Cms_admin.php */
/* Location: ./application/modules/navir_admin/controllers/navir_admin.php */