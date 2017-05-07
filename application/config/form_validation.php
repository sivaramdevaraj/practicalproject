<?php 
$config = array(
      'login' => array(
            array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
            ),
            array(
            'field'   => 'password', 
            'label'   => 'Password', 
            'rules'   => 'trim|required|min_length[6]|max_length[12]|xss_clean'
            )
      
      ),
   'register' => array(
      array(
      'field' => 'firstname',
      'label' => 'Firstname',
      'rules' => 'required|callback__alpha_dash_space'
      ),
       array(
      'field' => 'lastname',
      'label' => 'Lastname',
      'rules' => 'required|callback__alpha_dash_space'
      ),
      array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required|valid_email'
      ),
       array(
      'field' => 'phone',
      'label' => 'Mobile number',
      'rules' => 'required|callback__alpha_dash_space'
      ),
      array(
      'field'   => 'password', 
      'label'   => 'Password', 
      'rules'   => 'trim|required|min_length[6]|max_length[12]|xss_clean'
      ),
      array(
      'field'   => 'repassword', 
      'label'   => 'confirmpassword should enter same value of password', 
      'rules'   => 'trim|required|min_length[6]|max_length[12]|xss_clean|matches[password]',
      
      ),
      array(
      'field'   => 'optradio', 
      'label'   => 'Gender', 
      'rules'   => 'required'
      ),
      array(
      'field'   => 'validatedatepicker', 
      'label'   => 'Date of birth', 
      'rules'   => 'required'
      )
      ),
   'forgotpassword' => array(
      array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required|valid_email'
      )
      )
);




