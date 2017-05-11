<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Canceled_orders_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> table = 'canceled_orders';
		$this->primary_key='id';		
	}

	// public function reg_users($id)
	// {
	// 	$sql= "SELECT ru.*,st.name statename,c.name cityname 
	// 			 FROM regusers AS ru
	// 			 LEFT JOIN states AS st ON ru.state_id = st.id
	// 			 LEFT JOIN cities AS c ON ru.city_id = c.id
	// 			 Where ru.id = $id";
	// 	        $query=$this->db->query($sql);
 //     	         return $query->row();
	// }

}

/* End of file categories_model.php */
/* Location: ./application/modules/la_admin/models/categories_model.php */