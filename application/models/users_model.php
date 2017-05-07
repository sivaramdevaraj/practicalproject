<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'regusers';
		$this->primary_key='id';
		$this -> result_mode = 'object';
	}

	

}