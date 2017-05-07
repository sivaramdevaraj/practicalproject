<html>
  
   <body style="background:#e2e2e2;">
      <div style="margin:0 auto;width:820px;background:#fff;height:auto;padding:20px;">
	  <header>
	   <div style="width:255px;float:left;">
               <img style="width:150px;height:67px;" src="<?php echo base_url(IMAGES); ?>/logo2.png"/>
            </div>
            <div style="width:465px;float:left">
               <h3 style="margin-top: 23px;color:#1492de;">THANKS FOR REGISTERING WITH US</h3>
            </div>
            <!-- <div style="width:100px;float:left;">
               <img style="width:98px;height:auto;" src="http://delivertomyhome.com.au/resources/<?php echo base_url(IMAGES);?>/thank1.jpg"/>
            </div> -->
	  </header>  
	 <div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;"></div>	  
	<!--second-->
	<p>Dear Customer, 
    <p>Thank you for registering with Rice room. <br></p>
     As a valued customer, you can expect high quality , great value products and a professional and efficient service.</p>
		<p><b>We look forward to a long and mutual business relationship. </b></p>




	<p>Your login email ID: <span style="color:#415270;"><?php echo $user->email; ?></span></p>
	<div style="clear:both;"></div>	

	<p>Your friend referral code: <span style="color:#415270;"><?php echo $referalcode; ?></span></p>

	  <p>Refer your friend ...</p>
	<div style="clear:both;"></div>	
	
	<p><?php //echo $content_email[1]->description ?></p>
	<div style="clear:both;"></div>	
	<!--second end-->	  
	<!--third step-->
	  
	  <div style="clear:both;"></div>
	 <!--fourth step end-->	
	  <div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;"></div>
         <p style="color:#1492de;margin-bottom:0px;text-align:center;">Copyright <?php echo date('Y'); ?> &copy; Rice room</p>
      </div>
	 
	 
	  
      </div>
   </body>
</html>
