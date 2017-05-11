<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'gallery';
		$this->primary_key='id';
	}

}
