<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_components_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'city';
		$this->primary_key='id';		
	}
	public function citystate($id)
	{
		$sql= "SELECT c.id,c.name
			   FROM city AS c
			   JOIN states AS s ON  c.state_id = s.id 
			   WHERE s.id = '$id'";
		        $query=$this->db->query($sql);
     	         return $query->row();
	}

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */

