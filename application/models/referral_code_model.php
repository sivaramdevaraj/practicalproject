<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referral_code_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'referral_code';
		$this->primary_key='id';
		$this -> result_mode = 'object';
	}	

}