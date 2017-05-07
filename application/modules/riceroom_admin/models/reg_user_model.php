<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_user_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this -> table = 'regusers';
		$this->primary_key='id';
		$this -> result_mode = 'object';
	}
	public function reg_users($id)
	{
		$sql= "SELECT ru.*,st.name statename,c.name cityname 
				 FROM regusers AS ru
				 LEFT JOIN states AS st ON ru.state_id = st.id
				 LEFT JOIN cities AS c ON ru.city_id = c.id
				 Where ru.id = $id";
		        $query=$this->db->query($sql);
     	         return $query->row();
	}
	public function filter($zipcode,$date)
		{
			$date1=DATE('y-m-d',strtotime($date));
			$sql="SELECT  * 
				  FROM  regusers 
		          WHERE  DATE(last_updated)='$date1' AND zip_code='$zipcode'
		          ORDER BY last_updated DESC";

			$query=$this ->db ->query($sql);
	        return $query->result();
		}
public function filterdate($date)
		{
			$date1=DATE('Y-m-d',strtotime($date));
			$sql="SELECT *
				  FROM  regusers 
		          WHERE  DATE(last_updated)='$date1'
		          ORDER BY last_updated DESC";

			$query=$this ->db ->query($sql);
	        return $query->result();
		}
public function date_count($date)
	{
		$date1=DATE('Y-m-d',strtotime($date));
	echo $query="SELECT count(*)  from regusers 
				WHERE  DATE(last_updated)='$date1'";
		
		$results= $this->db->query($query);
		return $results->row('no_count');
	}
	public function filterdate_count($zipcode,$date)
	{
		$date1=DATE('y-m-d',strtotime($date));
			$sql="SELECT  count(*) 
				  FROM  regusers 
		          WHERE  DATE(last_updated)='$date1' AND zip_code='$zipcode'
		          ORDER BY last_updated DESC";

			$query=$this ->db ->query($sql);
	        return count($query);
	}
}