<html>
   <body style="background:#e2e2e2;">
      <div style="margin:0 auto; width:820px; background:#fff; height:auto; padding:20px;">
         <header>
            <div style="width:255px;float:left;">
               <a target="_balnk" href="<?php echo site_url(); ?>">
                  <img style="width:150px;height:67px;" src="<?php echo base_url(IMAGES); ?>/logo2.png"/>
               </a>
            </div>
         </header>
         <div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;"></div>
         <!--second-->
         <p>Dear <?=$name; ?>, </p>
         <p>Kindly click the below link to reset your password.</p>
         <p><a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a></p>
         <br>
         <br>
         <div style="clear:both;"></div>
         <!--second end-->	  
         <div style="background: #1565c0;">
            <p style="color:#fff;margin-bottom:0px;text-align:center;padding:10px 0;">Copyright <?php echo date('Y'); ?> &copy; Rice room</p>
         </div>
      </div>
   </body>
</html>


