<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> result_mode = 'object';
		//Do your magic here
	}

	public function countries()
	{
		$this -> table = 'countries';
		return $this -> dropdown('country_id','country_name');
	}

	public function send_mail($from,$to,$subject,$message,$cc='')
	{
	 	$this->load->library('email'); 
	 	$this->email->set_mailtype("html"); 
		$this->email->from('info@pacificit.in','Riceroom');
       	$this->email->to($to);
       	$this->email->subject($subject);
       	$this->email->message($message);  
       	$this->email->send();       
        return $this->email->print_debugger(); 
	}

	public function course_agenda	()
	{
		$this -> table = 'courses';
		return $this -> custom_dropdown('id','course_name',array('course_agenda !='=> 'NULL'));
	}
	public function register_sms($phone,$sms_message)
	{
		 $user="T2014092403"; //your username
		 $password="hjyu67k"; //your password
		 $mobilenumbers=$phone; //enter Mobile numbers comma seperated		
		 $message = $sms_message; //enter Your Message 
		 $senderid="DEMO"; //Your senderid
		 $messagetype="N"; //Type Of Your Message
		 $url="http://info.bulksms-service.com/WebserviceSMS.aspx";
		 //domain name: Domain name Replace With Your Domain  
		 $message = urlencode($message);
		 $ch = curl_init(); 
		 if (!$ch){die("Couldn't initialize a cURL handle");}
		 $ret = curl_setopt($ch, CURLOPT_URL,$url);
		 curl_setopt ($ch, CURLOPT_POST, 1);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);          
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		 curl_setopt ($ch, CURLOPT_POSTFIELDS, 
		"User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype");
		 $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//If you are behind proxy then please uncomment below line and provide your proxy ip with port.
		// $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
		$curlresponse = curl_exec($ch); // execute
		if(curl_errno($ch))
			echo 'curl error : '. curl_error($ch);

		 if (empty($ret)) {
		    // some kind of an error happened
		    die(curl_error($ch));
		    curl_close($ch); // close cURL handler
		 } else {
		    $info = curl_getinfo($ch);
		    curl_close($ch); // close cURL handler
		    //echo "<br>";
			//echo $curlresponse;    //echo "Message Sent Succesfully" ;
		   
		 }
	}
	public function home_pageautocomplete() // home search auto load query goes here
	{
		$query= "SELECT name from products where name LIKE '%".strtoupper($_GET['name_startsWith'])."%' ";
		$sql= "SELECT name from categories where name LIKE '%".strtoupper($_GET['name_startsWith'])."%' AND parent_id!='0'";
		$array1=$this->db->query($query)->result();
		$array2=$this->db->query($sql)->result();
		$result= array_merge($array2,$array1);
	 	$result= $this->direct_dropdown('name','name',$result);
      	return json_encode($result);
	}

}