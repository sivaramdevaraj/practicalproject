<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = "contents";
	}

}

/* End of file contants_model.php */
/* Location: ./application/modules/cms_admin/models/contants_model.php */