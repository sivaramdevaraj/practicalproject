<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		echo '<pre>'; print_r($this->session->all_userdata());
	}

	public function car_empty()
	{
		$this->cart->destroy();
	}

	public function check_array()
	{
		$data= $this->cart->in_cart('10');
		echo '<pre>'; print_r($data); exit;

	}

	public function clear_session()
	{
		$this->session->sess_destroy();
	}

	public function all_session()
	{
		print_r($this->session->all_userdata());
	}

	public function sucess()
	{
		$this->session->set_flashdata('message', 'Your new password has been emailed to you. Please check and login');
		$this->data['page'] = 'index';
	    $this->load->view('template', $this->data, FALSE);
	}

	public function error()
	{
		$this->session->set_flashdata('error', 'Your new password has been emailed to you. Please check and login');
		$this->data['page'] = 'index';
	    $this->load->view('template', $this->data, FALSE);
	}

	public function check_cookie()
	{
		$this->load->helper('cookie');     
		$cookie = array(
                    'name'   => 'city',
                    'value'  => '23',
                    'expire' => time()+86500,
                    'secure' => false
                );
        $this->input->set_cookie($cookie); 
        
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */