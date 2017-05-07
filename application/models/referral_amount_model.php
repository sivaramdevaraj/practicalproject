<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referral_amount_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'referral_amount';
		$this->primary_key='id';
		$this -> result_mode = 'object';
	}

	

}