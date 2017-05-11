<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Rice-Rendezvous</title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(CSS); ?>/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
         
      <link href="<?php echo base_url(CSS); ?>/responsive.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/ui.totop.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/jquery.fancybox.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/jquery.raty.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/adi.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/pop_up_model.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/style.css" rel="stylesheet">
      <link href="<?php echo base_url(CSS); ?>/jquery-ui.css" rel="stylesheet">
   </head>
   <body>
      <div class="container-fluid yellow_back navbar-fixed">
         <div class="container">
            <div class="row">
               <div class="col-md-1 hidden-sm text_cent_mob pad_l_o_first">
                  <a href="#app" class="black"><i class="fa fa-android head_icon"></i></a>
                  <a href="#app" class="black"><i class="fa fa-apple head_icon"></i></a>
                 
               </div>
                <div class="col-md-2 col-sm-2 pad_r_o_sec col-xs-6">
                  <form class="pull-left bang_100">
                      <?php  
                            $options =' id="city_id"  class="form-control head_pop_box sel_top required" tabindex="2"';
                            echo form_dropdown('city_id',$cities,@$city_id,$options);
                         ?>
                  </form>
                </div>
               <div class="col-md-5 col-sm-4 col-xs-6 pad_l_o_last">
                <form id="search_form_data" action="<?php echo site_url('search'); ?>" method="GET">
                  <div class="input-group">
                     <input type="text" name="search_data" value="<?=@$search_data ?>" class="form-control se_btn1 required" id="autocomplete" placeholder="Search">
                     <div class="input-group-btn serach_vert_top">
                        <button class="btn btn-default se_btn" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                     </div>
                  </div>
                </form>
               </div>
              
               <!--visible xs-->
               <div class="visible-xs">
                  <div class="col-xs-12">
                     <div class="col-xs-6 text-center xs_tb xs_pad_l_o">
                        <a href="#register" data-toggle="modal" class="black gr">Register  /</a>
                        <a href="#signin" data-toggle="modal" class="black gr">Sign In</a>
                     </div>
                     <div class="col-xs-6 text-center xs_tb xs_pad_r_o">
                        <a data-toggle="modal" class="black" href="#cart_model"><i class="fa fa-shopping-cart"></i> <b>Cart items (0)</b></a>
                     </div>
                  </div>
               </div>
               <!--visible xs end-->
               <!--my account information -->
               <?php if($this -> session -> userdata('user')) : ?>
                  <div class="col-md-2 sm_top col-sm-3">
                     <div class="pull-right">
                        <a href="#"  class="black gr dropdown-toggle2 my-account"  data-toggle="dropdown">Hi, <?php echo $user_details->name; ?> </a>
                        <ul class="dropdown-menu2 list-unstyled" role="menu">
                                <li><a href="<?php echo site_url('usersinfo/edit_profile'); ?>">Edit Profile</a></li> 
                                <li><a href="<?php echo site_url('usersinfo/orders'); ?>">My Order</a></li>                             
                                <li><a href="<?php echo site_url('usersinfo/logout') ?>">Logout</a></li>   
                              </ul>
                     </div>
                  </div>
              <?php else : ?>          
                  <div class="col-md-2 sm_top col-sm-3 hidden-xs">
                     <div class="pull-right">
                        <a href="#"  class="black gr reg_user">Register  /</a>
                        <a href="#"  class="black gr login_user">Sign In</a>
                     </div>
                  </div>
              <?php endif; ?>
              <!--my account information end -->


               <div class="col-md-2 sm_top cart_head col-sm-3 hidden-xs">
                  <div class="pull-right">
                     <a id="cart" class="black gr dropdown-toggle1" data-toggle="dropdown" href="#" aria-expanded="false">
                       <?php if(isset($cart_content)&& is_array($cart_content) && count($cart_content)) : ?>
                            <i class="fa fa-shopping-cart"></i> Cart ( <span class="cart_ajax_total_result"><?php echo count($cart_content); ?></span> items)</a>
                       <?php else : ?>
                            <i class="fa fa-shopping-cart"></i> Cart ( <span class="cart_ajax_total_result"><?php echo $this->cart->total_items(); ?></span> items)</a>                            
                       <?php endif; ?>
                     <!--cart dropdown-->
                     <div class="dropdown-menu1" role="menu">
                        <div class="cart_ajax_result">
                           <?php if(isset($cart_content)&& is_array($cart_content) && count($cart_content)) : ?>
                              <table class="table basket">
                                 <thead>
                                    <tr>
                                       <th class="text-center red">Image</th>
                                       <th class="text-center red">Product Name</th>
                                       <th class="text-center red">Wgt</th>                                    
                                       <th class="text-center red">Qty</th>
                                       <th class="text-center red">Amount</th>
                                       <th class="text-center red">Remove</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <!--<tr>
                                       <td colspan="5" align="center">Your cart is empty!</td>
                                       </tr>-->
                                    <?php foreach ($cart_content as $key => $items) { ?>
                                       <tr>
                                          <td class="text-center"><img src="<?php echo base_url(); ?>uploads/products/<?php echo $items['image'] ?>" class="cart_prod"></td>
                                          <td class="text-center f12"><?php echo $items['name'] ?></td>
                                          <td class="text-center"><?php echo $items['weight'] ?> kg</td>                                       
                                          <td class="text-center"><?php echo $items['qty'] ?> </td>
                                          <td class="text-center">Rs <?php echo $items['subtotal'] ?></td>
                                          <td class="text-center"><a data-id="<?php echo $items['id'] ?>" href="#" class="black remove_del"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                                       </tr>
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                    <tr>
                                       <td colspan="4" style="padding: 15px 0px 0px 20px;">
                                          <b>TOTAL AMOUNT: <span>Rs <?php echo $this->cart->format_number($this->cart->total()); ?></span></b>
                                       </td>
                                       <!-- <td colspan="3"></td> -->
                                       <td>
                                          <?php if($this -> session -> userdata('user')) : ?>
                                             <a class="btn btn-success btn-sm" href="<?php echo site_url('viewcart'); ?>">View Cart</a>
                                          <?php else : ?>
                                             <a class="btn btn-success btn-sm cart_login_user" href="#">View Cart</a>                                             
                                          <?php endif; ?>
                                       </td>
                                       <td>
                                          <?php if($this -> session -> userdata('user')) : ?>
                                             <a class="btn btn-danger btn-sm" href="<?php echo site_url('checkout'); ?>">Check Out</a>
                                          <?php else : ?>
                                             <a class="btn btn-danger btn-sm check_login_user" href="#">Check Out</a>                                             
                                          <?php endif; ?>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           <?php else :  ?>
                              <h6 align="center">Your cart is empty. Start shopping now! <i class="fa fa-shopping-cart"></i></h6> 
                           <?php endif; ?>
                        </div>
                     </div>
                     <!--cart dropdown-->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid  no_top_xs">
         <div class="container">
            <div class="row">
               <div class="col-md-3 col-sm-2 hidden-xs">
                  <a href="<?php echo site_url()?>welcome/index"><img src="<?php echo base_url(IMAGES); ?>/logo_2b.png" class="img-responsive logo" alt="image"></a>
               </div>
               <div class="col-md-9 col-sm-10 col-xs-12 navs_top">
                  <nav class="navbar navbar-default  nav_back_no pull-right menu_r_no_xs" role="navigation">
                     <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo site_url()?>welcome/index"><img src="<?php echo base_url(IMAGES); ?>/RR.JPG" class="logo visible-xs" alt="image"></a>
                     </div>
                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse padding_r_o" id="navbar-brand-centered">
                        <ul class="nav navbar-nav nav1 menu_r_20">
                           <li id="home_menu_active"><a href="<?php echo site_url(); ?>">Home</a></li>
                           <li id="shop_menu_active" class="dropdown">
                              <a class="dropdown-toggle disabled" data-toggle="dropdown" href="<?php echo site_url()?>rice/shop_now">Shop Now <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                              <?php if(isset($search_categories) && is_array($search_categories) && count($search_categories)): $i=1;?>
                                <?php foreach ($search_categories as $key => $category) { ?>
                                 <li><a href="<?php echo site_url('rice').'/'.str_replace(' ','-',$category->name); ?>"><?=$category->name; ?></a></li> 
                                <?php } ?>
                              <?php endif; ?>                            
                              </ul>
                           </li>
                           <li id="zone_menu_active">
                              <a href="<?php echo site_url()?>rice/wholesale_zone" >Wholesale Zone</a>
                             
                           </li>
                           <!-- <li id="offer_menu_active"><a href="#">Offer Zone</a></li> -->
                           <li id="contact_menu_active"><a href="<?php echo site_url()?>welcome/contact_us">Contact Us</a></li>
                           <li id="customer_menu_active"><a href="<?php echo site_url()?>welcome/customer_speak">Customer Speak</a></li>
                        </ul>
                     </div>
                     <!-- /.navbar-collapse -->
                  </nav>
               </div>
            </div>
         </div>
      </div>

