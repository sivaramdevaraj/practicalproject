<!DOCTYPE html>
<html lang="en" ng-app>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Rice Rendezvous Admin </title>
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datepicker.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script>var base_url= "<?php echo base_url()?>";</script>
</head>
<body class="sidebar-wide">
<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header"><a class="navbar-brand" href="<?php echo site_url().admin?>">Rice Rendezvous Admin<!-- <img src="<?php echo base_url()?>assets/images/logo.png" height="28" alt="Londinium">  --></a><a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons"><span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i></button>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar"><span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i></button>
  </div>
  <ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
    <li class="user dropdown"><a class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url()?>resources/images/RR.JPG" alt=""><span>Web Admin</span><i class="caret"></i></a>
      <ul class="dropdown-menu dropdown-menu-right icons-right">
        <li><a href="<?php echo site_url()?>auth/change_password"><i class="icon-cog"></i> Password Change</a></li>
        <li><a href="<?php echo site_url()?>auth/logout"><i class="icon-exit"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</div>
<!-- /navbar -->

<!-- Page container -->
<div class="page-container">
<!-- Sidebar -->
<div class="sidebar collapse">
<div class="sidebar-content">
<!-- Main navigation -->
<ul class="navigation">
  <li id="dashboard"><a href="<?php echo site_url().admin?>"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
	<li id="categories"><a href="<?php echo site_url().admin?>categories"><span>Categories</span> <i class="icon-home"></i></a></li>
  <li id="products"><a href="<?php echo site_url().admin?>products"><span>Products</span><i  class="icon-yin-yang"></i></a></li>
  <li id="ws_products"><a href="<?php echo site_url().admin?>whole_sales"><span>Whole sale Products</span><i  class="icon-yin-yang"></i></a></li>
  <li id="sate_area"><a href="<?php echo site_url().admin?>states/index/1"><span>State & Zipcodes</span><i  class="icon-yin-yang"></i></a></li>
  <li id="regusers"><a href="<?php echo site_url().admin?>regusers"><span>All Registered Users</span><i  class="icon-yin-yang"></i></a></li>
  <li id="review"><a href="<?php echo site_url().admin?>review"><span>All Rating Review</span><i  class="icon-yin-yang"></i></a></li>
   
<li id="order_report"><a href="#" class="expand"><span>Orders Details</span><i  class="icon-arrow-down10"></i></a>
<ul>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/1"><span>Recent orders</span> <i></i></a></li> 
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/2"><span>Shipping orders</span> <i></i></a></li>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/3"><span>Delivered</span> <i></i></a></li>
  <li id="order_report"><a href="<?php echo site_url().admin?>order_details/index/4"><span>Cancelled</span> <i></i></a></li>  
</ul>
</li>
  <li id="cms"><a href="#" class="expand"><span>CMS</span><i  class="icon-arrow-down10"></i></a>
    <ul>
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/slider"><span>Sliders</span> <i></i></a></li> 
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/return_policy"><span>Return Policy</span> <i></i></a></li>
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/cancellation"><span>Cancellation</span> <i></i></a></li>
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/aboutus"><span>About Us</span> <i></i></a></li>          
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/terms_condition"><span>Terms & Conditions</span> <i></i></a></li>          
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/privacy_policy"><span>Privacy Policy</span> <i></i></a></li>          
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/contact"><span>Contact Us</span> <i></i></a></li>          
      <li id="cms"><a href="<?php echo site_url().admin?>cms/index/social_links"><span>Social Links</span> <i></i></a></li>          
    </ul>
  </li>
</ul>
<!-- /main navigation -->
</div>
</div>
<!-- /sidebar -->
<!-- Page content -->
<div class="page-content">
