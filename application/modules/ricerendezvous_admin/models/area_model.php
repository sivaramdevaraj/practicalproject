<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'areas';
		$this->primary_key='id';
	}

}
