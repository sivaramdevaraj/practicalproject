 <script type="text/javascript">
 $('#register_form').validate();
   $('#user_login_form').validate();
   <?php if($this->session->flashdata('error')) { ?>
   $('#error_alert').modal({
      keyboard: true,
      show:true,
      backdrop:'static'
    });
   setTimeout(function(){ $("#error_alert").modal('toggle'); }, 2500);
  <?php } ?>
  <?php if($this->session->flashdata('message')) { ?>
   $('#sucess_alert_pop').modal({
      keyboard: true,
      show:true,
      backdrop:'static'
    });
   setTimeout(function(){ $("#sucess_alert_pop").modal('toggle'); }, 2500);
  <?php } ?>
   $(document).on('click','.login_user',function(){ 
     $('#signin2').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
     });
     $('#error_user_login').html('');
     $('label.error').hide();
     $('#user_login_form')[0].reset();
      return false;
   });
   $(document).on('click','.reg_user',function(){ 
     $('#register1').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
     });
     $('label.error').hide();
     $('#email_result').hide();
     $('#register_form')[0].reset();
      return false;
   });
   $(document).on('click','.check_login',function(){
      var url = "<?php echo site_url('usersinfo/user_login')?>";       
      if($('#user_login_form').valid()){
       var curl = $('.curl').val();
         $.ajax({
          type: "POST",
          url: url,
          data: $("#user_login_form").serialize(), // serializes the form's elements.
          success: function(data)
           {
             if(data=='2')   
               window.location.href = curl;
             else if(data=='1')
               $('#error_user_login').html('Your account is blocked.');
             else
               $('#error_user_login').html('The email or password you entered is incorrect.');                           
           }
         });
      }
      return false;
   });
   $(document).on('change', '#register_email', function() {
       var url = "<?php echo site_url('usersinfo/loginemail_check')?>";
       $.ajax({
           type: "POST",
           url: url,
           data: $("#register_email").serialize(), // serializes the form's elements.
           success: function(data) {
               if (data=='1') {              
                   $('#email_results').html('This email id already registered with us');
                   $('#register_email').val('');
               } else {
                   $('#email_results').html('');
             }
           }
       });
       return false;
   });
    $(document).on('change', '#register_number', function() {
       var url = "<?php echo site_url('usersinfo/loginnumber_check')?>";
       $.ajax({
           type: "POST",
           url: url,
           data: $("#register_number").serialize(), // serializes the form's elements.
           success: function(data) {
               if (data == '1') {              
                   $('#number_result').html('This phone number is already registered with us');
                   $('#register_number').val('');
               } else {
                   $('#number_result').html('');
             }
           }
       });
       return false;
   });
   $(document).on('click','.check_fwd_pwd',function(){
      var url = "<?php echo site_url('usersinfo/forgot_password')?>";       
      if($('#forget_password_form').valid()){
       var curl = $('.curl').val();
         $.ajax({
          type: "POST",
          url: url,
          data: $("#forget_password_form").serialize(), // serializes the form's elements.
          success: function(data)
           {
             if(data=='1')   
               window.location.href = curl;
             else
               $('#error_fwd_password').html('Email account does not exist');                     
           }
         });
      }
      return false;
   });
   $(document).on('click','.cart_login_user',function(){ 
     $('#signin2').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
     });
     $('#error_user_login').html('');
     $('.curl').val('<?php echo site_url('viewcart'); ?>');
     $('label.error').hide();
     $('#user_login_form')[0].reset();
      return false;
   });
   $(document).on('click','.check_login_user',function(){ 
     $('#signin2').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
     });
     $('#error_user_login').html('');
     $('.curl').val('<?php echo site_url('checkout'); ?>');
     $('label.error').hide();
     $('#user_login_form')[0].reset();
      return false;
   });
   </script>