<?php include_once('includes/header.php'); ?>
<div class=" b_top_menu"></div>

<div class="container-fluid m_top_10">
    <div class="container"> 
        <div class="row mrow">
      	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497699.6983259305!2d77.63093949999997!3d12.953997399999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1441862909778" width="100%" height="400" class="height_map" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div> 
</div>


<div class="container-fluid">
    <div class="container"> 
        <div class="row text-justify">
      	    <h1 class="style_font text-center red">Contact Us</h1>
      	    <div class="col-md-6 col-sm-6">
              <h4 class="red"><i class="fa fa-map-marker"></i> Riceroom Address</h4>
               <p><?php echo $address->description?></p>
             <p><b><i class="fa fa-phone"></i> Phone :</b> <?php echo $phone->description?></p>
             <p><b><i class="fa fa-envelope"></i> Email :</b> <?php echo $email->description?></p>
             <p><b><i class="fa fa-envelope"></i> Fax :</b> <?php echo $fax->description?></p>
            </div>
            <div class="col-md-6 col-sm-6">
              <h4 class="red"><i class="fa fa-envelope"></i> Let Us Help You</h4>
              <form class="form-horizontal"  id="contact_form" method="post" action="<?php echo site_url('welcome/contact_form')?>">
                  <div class="form-group">
                     <label class="col-md-3 col-sm-3 col-xs-12 control-label left1">Your Name</label>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="name" class="form-control required" placeholder="Enter your name" aria-required="true">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 col-sm-3 col-xs-12 control-label left1">Email Id</label>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="email" class="form-control required email" placeholder="Enter email id" aria-required="true">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 col-sm-3 col-xs-12 control-label left1">Phone No.</label>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="phone" maxlength="10" minlength="10" class="form-control required number" placeholder="Enter your phone no." aria-required="true">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-3 col-sm-3 col-xs-12 control-label left1">Message</label>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="message" class="form-control required" rows="3" placeholder="Message" aria-required="true"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="text-center">
                        <input type="submit" name="send" class="btn btn-danger" value="submit">
                     </div>
                  </div>
               </form>
            </div>
        </div>
    </div> 
</div>

<?php include_once('includes/footer.php'); ?>