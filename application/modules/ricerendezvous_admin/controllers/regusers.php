<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regusers extends Admin_Controller {
	
   public function __construct()
	{
		parent::__construct();
		$this ->load -> model ('reg_user_model','regusers');
	    $this -> data['page']='regusers';
			
	}
          
	public function index()
	{
		$this-> data['all_users'] = $this-> regusers ->get_all();
		$this -> data['mode'] = 'all';
		$this-> load -> view('template', $this->data);
	}
}

