<!--sixth part-->
<!-- <div class="container-fluid m_top_10" id="app">
  <div class="container">
    <div class="row">
    <br>
     <div class="col-md-8 col-sm-8">
       <h4><b>Experience Convenience - Finish Rice Shopping on the Go!</b></h4>
       <h4><b>Download the RiceRendezvous Mobile App Now!!</b></h4>
       <div class="row">
         <div class="col-md-3 col-sm-6 col-xs-6">
           <img src="<?php echo base_url(IMAGES); ?>/g.png" class="img-responsive">
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
           <img src="<?php echo base_url(IMAGES); ?>/g1.png" class="img-responsive">
         </div>
       </div>
     </div>
     <div class="col-md-4 col-sm-4">
       <img src="<?php echo base_url(IMAGES); ?>/rice-bag.png" class="img-responsive">
     </div>

    </div>
  </div>
</div>--> 
<!--sixth part end-->
<!--footer-->
<div class="container-fluid foot_back">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-3 cen">
            <h3 class="red">Rice Rendezvous</h3>
             <p><b><i class="fa fa-map-marker"></i> Address</b><br>
              <?php echo $address->description?>
             </p>
             <p><b><i class="fa fa-phone"></i> Phone :</b><?php echo $phone->description?></p>
             <p><b><i class="fa fa-envelope"></i> Email :</b> <?php echo $email->description?></p>
             <!-- <p><b><i class="fa fa-envelope"></i> Fax :</b> <?php echo $fax->description?></p> -->
         </div>
         <div class="col-md-3 col-sm-3 cen">
            <h3 class="foot_fonts">Wholesale Zone</h3>
            <ul class="list-unstyled clearfix">
              <?php if(isset($search_categories) && is_array($search_categories) && count($search_categories)): $i=1;?>
                 <?php foreach ($search_categories as $key => $category) { ?>
                    <li><a href="<?php echo site_url('rice').'/'.str_replace(' ','-',$category->name); ?>" class="blacks b_font"><?=$category->name; ?></a></li>
                 <?php } ?>
              <?php endif; ?>
            </ul>
         </div>
         <div class="col-md-3 col-sm-3 cen">
            <h3 class="foot_fonts">Follow Us</h3>
            <ul class="list-unstyled clearfix">
             <li><a href="<?php echo $facebook->other_column?>" target="_blank" class="blacks b_font"><i class="fa fa-facebook"></i> Facebook</a></li>
             <li><a href="<?php echo $gmail->other_column?>" target="_blank" class="blacks b_font"><i class="fa fa-envelope"></i> Gmail</a></li>
             <li><a href="<?php echo $twitter->other_column?>" target="_blank" class="blacks b_font"><i class="fa fa-twitter"></i> Twitter</a></li>
             <li><a href="<?php echo $google_plus->other_column?>" target="_blank" class="blacks b_font"><i class="fa fa-google-plus"></i> Google Plus</a></li>
             <li><a href="<?php echo $linkedin->other_column?>" target="_blank" class="blacks b_font"><i class="fa fa-linkedin"></i> Linked in</a></li>
            </ul>
         </div>
         <div class="col-md-3 col-sm-3 cen">
            <h3 class="foot_fonts">Our Policies</h3>
            <ul class="list-unstyled clearfix">
             
             <li><a href="<?php echo site_url('welcome/return_policy') ?>" class="blacks b_font">Return Policy</a></li>
             <li><a href="<?php echo site_url('welcome/cancellation') ?>" class="blacks b_font">Cancellation</a></li>
             <li><a href="<?php echo site_url('welcome/aboutus') ?>" class="blacks b_font">About Us</a></li>
             <li><a href="<?php echo site_url('welcome/terms_condition') ?>" class="blacks b_font">Terms & Conditions</a></li>
             <li><a href="<?php echo site_url('welcome/privacy_policy') ?>" class="blacks b_font">Privacy Policy</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!--footer end-->
<!--footer-->
<div class="container-fluid foot_back1">
   <div class="container">
      <div class="row">
       <div class="col-md-6 col-sm-7">
         <p class="blacks m_top_10">Copyright &copy; 2017 Rice Rendezvous All Rights Reserved.</p>
       </div>
       <div class="col-md-6 col-sm-5">
       <div class="pull-right f_none_resp">
         <!-- <p class="blacks m_top_10">Powered by <a href="http://www.webdesignpis.com/" target="blank" class="red">Prabha Info Solutions</a></p> -->
       </div>
       </div>
      </div>
   </div>
</div>
<!--footer end-->
 <!--register-->
      <div class="modal fade" id="register1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content modal_content">
               <div class="modal-header padding_bottom mod_head">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="pull-left">
                     <h4 class="modal-title" id="myModalLabel">Register</h4>
                  </div>
                  <div class="pull-right">
                     <p class="small_font">Already Registered? &nbsp; <a  href="#" class="black login_user" data-toggle="modal" data-dismiss="modal">Sign In</a> &nbsp; </p>
                  </div>
               </div>
               <div class="modal-body">
                  <form action="<?php echo site_url('usersinfo/user_registration'); ?>" class="form-horizontal" method="post" id="register_form">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Your Name</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control required" name="name" placeholder="Enter your name">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Email Id</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control required email" name="email"  id="register_email" placeholder="Enter your email id">
                        </div>
                     </div>
                     <div align="center" class="text-danger error" id="email_results"></div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Phone No.</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control required number" name="phone" maxlength="10" id="register_number" minlength="10" placeholder="Enter your phone no.">
                        </div>
                     </div>
                     <div align="center" class="text-danger error" id="number_result"></div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                           <input type="password" id="us_pwd" class="form-control required" name="password" placeholder="Enter your password.">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                           <input type="password" class="form-control required" equalto="#us_pwd" title="These passwords don't match. Try again?" name="c_password" placeholder="Renter your password">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="text-center">
                           <input type="hidden" class="curl" name="curl" value="<?php echo current_url(); ?>">
                           <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--register end-->
      <!--signin-->
      <div class="modal fade" id="signin2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content modal_content">
               <div class="modal-header padding_bottom mod_head">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="pull-left">
                     <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                  </div>
                  <div class="pull-right">
                     <p class="small_font">New User? &nbsp; <a  href="#" data-toggle="modal" data-dismiss="modal" class="black reg_user">Register</a> &nbsp; </p>
                  </div>
               </div>
               <div class="modal-body">
                  <form  class="form-horizontal" role="form" id="user_login_form">
                     <!-- Text input-->  
                     <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                           <input type="text" placeholder="Enter valid Email Id" class="form-control required email" name="email">
                        </div>
                     </div>
                     <!-- Text input-->  
                     <!-- Text input-->  
                     <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                           <input type="password" placeholder="Enter your password" class="form-control required" name="password">
                        </div>
                     </div>
                     <!-- Text input-->  
                     <!-- Text input--> 
                    <div align="center" class="text-danger error" id="error_user_login"></div>
                     <div class="col-md-6 text-center">
                        <input type="hidden" class="curl" name="curl" value="<?php echo current_url(); ?>">
                        <button type="submit" class="btn btn-danger check_login">Sign In</button>
                     </div>
                     <div class="col-md-6 text-center sm_top">
                        <a class="black" href="#forgot" data-toggle="modal" data-dismiss="modal"><b>Forgot Password?</b></a>
                     </div>
                     <!-- Text input-->      
                     <div class="clearfix"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--signin end-->
      <!--forgot-->
      <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content modal_content">
               <div class="modal-header  mod_head">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
               </div>
               <div class="modal-body">
                  <p class="text-center">Please enter your email id below. We will send you a link to reset your password.</p>
                  <form action="#" class="form-horizontal" id="forget_password_form" role="form" id="forg">
                     <!-- Text input-->  
                     <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                           <input type="text" placeholder="Enter Your Email Id" class="form-control required email" name="f_email">
                        </div>
                     </div>
                     <!-- Text input-->  
                     <!-- Text input-->
                     <div align="center" class="text-danger error" id="error_fwd_password"></div>  
                     <div class="col-md-6 text-center">
                        <input type="hidden" class="curl" name="curl" value="<?php echo current_url(); ?>">
                        <button type="submit"  class="btn btn-danger check_fwd_pwd">Submit</button>
                     </div>
                     <!-- Text input-->      
                     <div class="clearfix"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--forgot end-->
          <!--cart modal-->
               <div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header   mod_head">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">Cart Items(0)</h4>
                        </div>
                        <div class="modal-body clearfix xs_panel">
                           <div class="col-xs-4 xs_pad3">
                              <h5 class="green text-center">Product Name</h5>
                              <p class="text-center">Product name</p>
                           </div>
                           <div class="col-xs-2 xs_pad3">
                              <h5 class="green text-center">QTY</h5>
                              <p class="text-center">2</p>
                           </div>
                           <div class="col-xs-3 xs_pad3">
                              <h5 class="green text-center">Amount</h5>
                              <p class="text-center">&#36; 100</p>
                           </div>
                           <div class="col-xs-3 xs_pad3">
                              <h5 class="green text-center">Remove</h5>
                              <p class="text-center"><a href="#" class="black"><i class="fa fa-times"></i></a></p>
                           </div>
                        </div>
                        <div class="modal-footer text-center">
                           <a href="#" type="button" class="btn btn-success btn-sm">View Cart</a>
                           <a href="#" type="button" class="btn btn-danger btn-sm">Checkout</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!--cart modal end-->
  <!--default popup-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
          <div class="modal-content modal_content">
             <div class="modal-header">
               <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h4 class="modal-title text-center text-uppercase" id="myModalLabel">Select City</h4>
             </div>
             <div class="modal-body">
                <form method="POST" action="<?php echo site_url('welcome/set_city_cookie'); ?>" id="city_pop" class="form-horizontal">
                   <div class="form-group">
                      <label  class="col-sm-3 control-label">Select City</label>
                      <div class="col-sm-8">                    
                         <?php  $cities [''] = 'Select City';
                            $options =' id="city_id"  class="form-control required" tabindex="2"';
                            echo form_dropdown('city_id',$cities,'',$options);
                         ?>
                      </div>
                   </div>
                   <div class="form-group">
                      <div class="text-center">
                         <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
  <!--default popup end-->
  <!-- Flash message pop up --> 
  <div class="modal fade" id="sucess_alert_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content conts">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title green_flash green" id="myModalLabel"><span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong></h5>
        </div>
        <div class="modal-body">
           <p class="green_flash"><span class="cart_my_msg"></span>
            <?php if($this->session->flashdata('message')) { ?>
             <?php echo $this->session->flashdata('message')?>
            <?php } ?>
           </p>
        </div>
      </div>
    </div>
  </div>
<!-- End Flash message pop up -->
<!-- Flash Error message pop up -->
  <div class="modal fade" id="error_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content conts1">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title f_red" id="myModalLabel"><span class="glyphicon glyphicon-envelope"></span> <strong>Message</strong></h5>
        </div>
        <div class="modal-body">
            <?php if($this->session->flashdata('error')) { ?>
              <p class="f_red"><?php echo $this->session->flashdata('error')?></p>
           <?php } ?>
        </div>       
      </div>
    </div>
  </div>
<!-- End Error Flash message pop up -->
               
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="<?php echo base_url(JS); ?>/bootstrap.min.js"></script>
      <script>
         $(document).ready(function ()
         {
         
         $('.dropdown-toggle2').mouseover(function() {
         $('.dropdown-menu2').show();
         });
         
         $('.dropdown-toggle2').mouseout(function() {
         t = setTimeout(function() {
            $('.dropdown-menu2').hide();
         }, 0);
         $('.dropdown-menu2').on('mouseenter', function() {
            $('.dropdown-menu2').show();
            clearTimeout(t);
         }).on('mouseleave', function() {
            $('.dropdown-menu2').hide();
         })
         })
         })
      </script>
     <script>
         $(document).ready(function ()
         
         {
       
         $('.dropdown-toggle1').mouseover(function() {
         $('.dropdown-menu1').show();
         });
         
         $('.dropdown-toggle1').mouseout(function() {
         t = setTimeout(function() {
            $('.dropdown-menu1').hide();
         }, 0);
         
         
         $('.dropdown-menu1').on('mouseenter', function() {
            $('.dropdown-menu1').show();
            clearTimeout(t);
         }).on('mouseleave', function() {
            $('.dropdown-menu1').hide();
         })
         })
         })
      </script>
      <script src="<?php echo base_url(JS); ?>/updown.js"></script>
           <script>
         $(document).ready(function() {
          $('.collapse').on('show.bs.collapse', function() {
              var id = $(this).attr('id');
              $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
              $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
          });
          $('.collapse').on('hide.bs.collapse', function() {
              var id = $(this).attr('id');
              $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
              $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
          });
      });
      </script>

      <script>
       
         $(function(){
             $('.dropdown-menu').hide();
         $(".dropdown").hover( 
         function() {
         $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
         $(this).toggleClass('open');
         $('b', this).toggleClass("caret caret-up"); 
         },
         function() {
         $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
         $(this).toggleClass('open');
         $('b', this).toggleClass("caret caret-up"); 
         });
         });
      </script>
      <script src="<?php echo base_url(JS); ?>/jquery.validate.min.js"></script>
      <script>
         $('#search_form_data').validate();
         $('#contact_form').validate();
         $('#contact_form1').validate();
         $('#contact_form2').validate();
         $('#reg').validate();
         $('#sign').validate();
         $('#forg').validate();
      </script>
        
      
      <script src="<?php echo base_url(JS); ?>/scrollreveal.js"></script>
      <script type="text/javascript">
         (function($) {
         
           'use strict';
         
           window.sr= new scrollReveal({
             reset: true,
             move: '50px',
             mobile: true
           });
         
         })();
      </script>
      <script>
   $(document).ready(function() {    
       //Events that reset and restart the timer animation when the slides change
       $("#transition-timer-carousel").on("slide.bs.carousel", function(event) {
           //The animate class gets removed so that it jumps straight back to 0%
           $(".transition-timer-carousel-progress-bar", this)
               .removeClass("animate").css("width", "0%");
       }).on("slid.bs.carousel", function(event) {
           //The slide transition finished, so re-add the animate class so that
           //the timer bar takes time to fill up
           $(".transition-timer-carousel-progress-bar", this)
               .addClass("animate").css("width", "100%");
       });
       
       //Kick off the initial slide animation when the document is ready
       $(".transition-timer-carousel-progress-bar", "#transition-timer-carousel")
           .css("width", "100%");
   });
   
</script>
<script type="text/javascript">
$(window).bind('scroll', function () {
if ($(window).scrollTop() > 50) {
$('.navbar-fixed').addClass('fixed');
} else {
$('.navbar-fixed').removeClass('fixed');
}
});
</script>

<script src="<?php echo base_url(JS); ?>/jquery.fancybox.js" type="text/javascript"></script>
<script type="text/javascript">
   $(".fancybox")
      .attr('rel', 'gallery')
      .fancybox({
          openEffect : 'none',
          helpers : {
              title : null            
          }           
      });
</script>
<script src="<?php echo base_url(JS); ?>/easing.js" type="text/javascript"></script>
<script src="<?php echo base_url(JS); ?>/jquery.ui.totop.js" type="text/javascript"></script>
      <!-- Starting the plugin -->
      <script type="text/javascript">
         $(document).ready(function() {
           
            
            $().UItoTop({ easingType: 'easeOutQuart' });
            
         });
      </script>


        <script type="text/javascript">
   //plugin bootstrap minus and plus
   //http://jsfiddle.net/laelitenetwork/puJ6G/
 


   $('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
   });
   $('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
   });
   $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script src="<?php echo base_url(JS); ?>/jquery.raty.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
    $("#rating").raty({
     path : "<?php echo base_url() ?>resources/images/",
     half: true
     });
     
     $("#click").raty({
     path : "<?php echo base_url() ?>resources/images/",
     score   : '0',
     readOnly    : true
     });
     $("#click1").raty({
     path : "<?php echo base_url() ?>resources/images/",
     score   : '5',
     readOnly    : true
     });
     $("#click2").raty({
     path : "<?php echo base_url() ?>resources/images/",
     score   : '3',
     readOnly    : true
     });
     $("#click3").raty({
     path : "<?php echo base_url() ?>resources/images/",
     score   : '0',
     readOnly    : true
     });
     $("#click4").raty({
     path : "<?php echo base_url() ?>resources/images/",
     score   : '2',
     readOnly    : true
     });
     
     
   });
   $(document).on('click','.remove_del',function(){
      var p_id = $(this).attr('data-id');
      url = "<?php echo site_url()?>product_cart/add_cart_delete/"; 
      $.ajax({
          dataType:"json",
          url: url,
          data: {p_id:p_id},
          success: function(data)
          {       
             $('.cart_ajax_result').html(data.pro);
             $('.cart_ajax_total_result').html(data.cart_total);
             $('.chang_cart_data').html(data.cart);
             $(".detail_add"+p_id).hide();
             $(".add"+p_id).show();
          }
      });
      $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
      .animate({ opacity: "hide" }, "slow");
   });
   $(document).on('change','.head_pop_box',function(){
      var city_id = $(this).val();   
      url = "<?php echo site_url()?>welcome/set_city_cookie/"; 
      $.ajax({
          type: "POST",
          url: url,
          data: {city_id:city_id},
          success: function(data)
          {       
             location.reload();
          }
      });
   });
   
</script>
<script src="<?php echo base_url(JS); ?>/jquery-ui.js"></script>
<script>
var availableTags = <?php echo $json_data; ?>;
$( "#autocomplete" ).autocomplete({
  source: availableTags
});
</script>
<?php if(!$this->input->cookie('city_id', TRUE)): ?>
 <script type="text/javascript">
  $('#myModal').modal({
    keyboard: false,
    show:true,
    backdrop:'static'
  });
  $('#city_pop').validate();
  </script>
 <?php endif; ?>
<?php include('all_scripts.php'); ?>
 
   </body>
</html>