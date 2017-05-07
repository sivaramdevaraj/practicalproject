<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'countries';
		$this->primary_key='id';
	}

}
