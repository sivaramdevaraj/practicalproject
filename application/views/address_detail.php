<?php include_once('includes/header.php'); ?>

<div class="container-fluid txt_clr  b_top_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 m_top_26 hidden-sm hidden-xs">
	            <div class="row">
	              	<div class="col-md-3">
	              		<i class="fa fa-lock fa-2x lock_clr pull-right"></i>
	              	</div>
	              	<div class="col-md-9 txt_spc">
	              	   <h5>This is a Secure Payment</h5>
	              	</div>   
	            </div>
            </div>


           	<div class="col-md-6 col-sm-6 m_top_10">
	            <div class="stepwizard step_wizard">
	               <div class="stepwizard-row step_wizard_row">
	                  <div class="stepwizard-step">
	                     <a href="#"><img src="<?php echo base_url(IMAGES); ?>/1.png" alt="image"></a>
	                     <p>BAG</p>
	                  </div>
	                  <div class="stepwizard-step">
	                     <a href="#"><img src="<?php echo base_url(IMAGES); ?>/2.png" alt="image"></a> 
	                     <p>DELIVERY</p>
	                  </div>
	                  <div class="stepwizard-step">
	                     <a href="#"><img src="<?php echo base_url(IMAGES); ?>/3.png" alt="image"></a> 
	                     <p>PAYMENT</p>
	                  </div>
	               </div>
	            </div>
        	</div>

            <div class="col-md-3 col-sm-3 m_top_26 cont_shp">
            <a href="index.php" class="btn btn-default btn-danger buttn_box pull-right cont_shp1">Continue Shopping</a>
        
            </div>

        </div>
    </div>
</div>
<!--END-->



<!-- breadcrumb Starts here -->
    <div class="container-fluid bredbg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb breadc_b">
              <!-- <li><a href="index.html"><i class="fa fa-home"></i></a></li>-->
             	<li><a href="index.php" class=" red"><i class="fa fa-home hidden-xs"></i> HOME</a></li>  
               	<li class="active"> Your Delivery Address</li> 
            </ul>
          </div>
        </div>
      </div>
    </div>
  <!-- breadcrumb ends here -->
<form method="post" action="<?php echo site_url('place_order/shipping') ?>" id="address_details_form">
<!-----content------>
<div class="container-fluid">
    <div class="container">
        <div class="row">
          	<div class="col-md-8">
            	<div class="panel panel-default">
				  <div class="panel-body">
				    
		                <div class="form-group">
		                    <label><b><span class="red">*</span> Name:</b></label>
		                    <input type="text" value="<?php echo $user_info->name; ?>" name="name" class="form-control required" placeholder="Enter your name">
		                </div>
		               <div class="form-group">
		                    <label><b><span class="red">*</span> Phone No.:</b></label>
		                    <input type="text" value="<?php echo $user_info->phone; ?>" name="shipping_phone" class="form-control required" placeholder="Enter phone number">
		                </div>
		                <div class="form-group">
		                    <label><b><span class="red">*</span> City:</b></label>
		                    <input type="text" name="shipping_city" value="<?php echo @$city_info->name; ?>" readonly="readonly" class="form-control required" placeholder="Enter city name">
		                </div>
		                <div class="form-group">
		                    <label><b><span class="red">*</span> Post Code:</b></label>
		                    <input type="text" name="shipping_postcode" id="postcode" class="form-control required number"placeholder="Enter post code"> 		                     <div id="error_result_pincode"></div>
		                </div>
		                <div class="form-group">
		                    <label><b><span class="red">*</span> Address:</b></label>
		                    <textarea class="form-control required" rows="3" placeholder="Enter your address" name="shipping_address"></textarea>
		                </div>
		                <div class="form-group">
		                    <label><b><span class="red">*</span> Country:</b></label>
		                    <select disabled="disabled" name="count2" class="form-control required">
		                    <option selected="selected" value="Australia" selected="">Australia</option>
		                    </select>
		                </div> 
		                <div class="form-group">
		                    <label><b><span class="red">*</span>  Region / State:</b></label>
		                    <select disabled="disabled" name="shipping_state" class="form-control required">
		                    <option value="Victoria">Victoria</option>
		                    </select>
		                </div>
		                 <div class="col-md-3"></div> 
		         
				  </div>
				</div>
            </div>

            <div class="col-md-4">
            <div class="panel panel-default">
             <?php if(!$this -> session -> userdata('discount_amount')): ?>
			  	<div class="panel-body pad5_code ref_data_close">
                  <h5 class="text-center">Referral Code (optional)</h5>
                  <hr>
                  <div class="col-md-11 center-block f_none">
                    <div class="form-group">
                    	<input type="text"  id="ref_code" name="ref_code" class="form-control">
                    	<div id="error_result_ref"></div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-danger pull-right btn-sm ref_code_btn">Apply</button>
                    </div>
                  </div>
			  	</div>
			 <?php endif; ?>
			</div>
	            <div class="panel panel-default">
	              <div class="ajax_result_address">
				  	<div class="panel-body">
				    	<h4 class="text-center">Delivery Options</h4><hr>
			         		<div class="delivery_time">
				         		<i class="fa fa-truck fa-2x green"></i>
				         		<span>Delivery in 5 - 8 Days</span>
			         		</div>
			         	<ul class="list-unstyled">
			         		<li><h5><?php echo $this->cart->total_items()?> Item</h5></li>
			            </ul>
			         	<ul class="list-unstyled">
			         		<li><label>Order Total</label><span class="pull-right">$<?php echo round($this->cart->total());?></span></li>
			         		<li><label>Delivery Charges</label><span class="pull-right">--</span></li>
			         		<?php if($discount=$this -> session -> userdata('discount_amount')): ?>
			         			<li><label>Discount </label><span class="pull-right">$<?php echo $discount; ?></span></li>
			         		<?php endif; ?>

			         	</ul>
			         	<hr>
			        	<ul class="list-unstyled">
			        	   <?php if($discount=$this -> session -> userdata('discount_amount')): ?>
				         	<li><label class="bold">Total</label><span class="pull-right">$<?php echo round($this->cart->total()) - $discount;?></span></li>
				           <?php else : ?>
				           	<li><label class="bold">Total</label><span class="pull-right">$<?php echo round($this->cart->total())?></span></li>
				           <?php endif; ?>	
				        </ul>

						<fieldset>
							<label class="radio-inline">
							<input type="radio" name="payment_type" value="cod" checked="checked" id="rad1">Cash On Delivery </label>
							<label class="radio-inline pull-right cash-del">
							<input type="radio" name="payment_type" value="online" id="rad2"> Online Payment </label>
						</fieldset>

				        <button type="submit" disabled="disabled" class="btn btn-default m_top_10 pull-right btn-sm rad_disp1 btn-danger" style="display: block;">Proceed To Order</button> 
                		<button type="submit" disabled="disabled" class="btn btn-default m_top_10 pull-right btn-sm rad_disp2 btn-danger" style="display: none;">Continue To Payment</button>				    
				  	  
				  	</div>
				  </div>
				</div>
            </div>
            
        </div>   
    </div>
</div>
</form>

<!-- content ends -->

<?php include_once('includes/footer.php'); ?>
<script>
 $(document).ready(function(){
	$("rad_disp1").show();
	$('.cart_head').hide(); 

	$("#rad1").click(function(){
	$(".rad_disp1").show();
	$(".rad_disp2").hide();

	});
	$("#rad2").click(function(){
	$(".rad_disp1").hide();
	$(".rad_disp2").show();
	});
  });
$(document).on('change','#postcode',function(){
	var postcode =$('#postcode').val();
	var url = "<?php echo site_url('checkout/check_postcode_available')?>"; 
	$.ajax({
		type: "POST",
		url: url,
		dataType: "json",
		data: {postcode:postcode}, // serializes the form's elements.
		success: function(data)
		{  
			if(data.message=='success')
			{   
				$('#error_result_pincode').html('');
				$('.ajax_result_address').html(data.pro);
			}
			else
			{ 
				$('#error_result_pincode').html('We do not deliver to this location.');
				$('#error_result_pincode').addClass('red');
				$('.ajax_result_address').html(data.pros);

			}
		} 
	});
	return false;    
});
$(document).on('click','.ref_code_btn',function(){
	var postcode =$('#postcode').val();
	var ref_code =$('#ref_code').val();
		var url = "<?php echo site_url('checkout/check_referal_available')?>"; 
		$.ajax({
			type: "POST",
			url: url,
			dataType: "json",
			data: {ref_code:ref_code,postcode:postcode}, // serializes the form's elements.
			success: function(data)
			{ 
			  if(data.code_status=='success')
			   {
				if(data.message=='success')
				{   
					$('.ajax_result_address').html(data.pro);
				}
				else
				{ 
					$('.ajax_result_address').html(data.pros);

				}

					$('.ref_data_close').hide();

			   }
			  else {
			  		$('#error_result_ref').html('Invalid code');
					$('#error_result_ref').addClass('red');
			  }
			} 
		});	
	return false;    
});
   $('#address_details_form').validate();
  
</script>