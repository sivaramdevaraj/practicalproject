<?php include_once('includes/header.php'); ?>
<!--START-->
<div class="container-fluid txt_clr b_top_menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 m_top_25 hidden-sm hidden-xs">
	            <div class="row">
	              	<div class="col-md-3">
	              		<i class="fa fa-lock fa-2x lock_clr pull-right"></i>
	              	</div>
	              	<div class="col-md-9 txt_spc">
	              	   <h5>This is a secure payment</h5>
	              	</div>   
	            </div>
            </div>


           	<div class="col-md-6 col-sm-6">
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

            <div class="col-md-3 col-sm-3 m_top_25 cont_shp">
                <a href="<?php echo site_url('rice/shop_now'); ?>" class="cont_shp1 btn btn-danger pull-right buttn_box">Continue Shopping</a> 

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
             	<li><a href="<?php echo site_url(''); ?>" class=" red"><i class="fa fa-home"></i> HOME</a></li>  
               	<li class="active"> CART</li> 
            </ul>
          </div>
        </div>
      </div>
    </div>
  <!-- breadcrumb ends here -->




	<div class="container-fluid">
		<div class="container">
		    <div class="row">
		        <div class="col-md-12 chang_cart_data">
		        <div class="hidden-xs">
		        <?php if(isset($cart_content)&& is_array($cart_content) && count($cart_content)) : ?>
		            <table class="table table-condensed tb_bor">
		                  	<tr class="tb_head bold">
		                       	<td class="text-center">Image</td>
		                     	<td class="text-center">Item Name</td>
		                     	<td class="text-center">Weight</td>
		                     	<td class="text-center">Quantity</td>
		                     	<td class="text-center">Price <span>( <i class="fa fa-dollar"></i> )</span></td>
		                     	<td class="text-center">Amount<span> ( <i class="fa fa-dollar"></i> )</span></td>
		                  	</tr>		         
		                <tbody>
		                   <?php foreach ($cart_content as $key => $items) { ?>
		                   	<?php $cart_data= $this->cart->in_cart($items['id']); ?> 
		                   	<?php $products=$this->product->get($items['id']);?>
		                  	 <tr>
		                       	<td class="text-center"><img src="<?php echo base_url(); ?>uploads/products/<?php echo $items['image'] ?>" class="prod_imgs"></td>
		                     	<td class="text-center p_tops_33"><?php echo $items['name'] ?></td>
		                     	<td class="text-center p_tops_33"><?php echo $items['weight'] ?> kg</td>
		                     	<td class="text-center p_tops_33">
		                     		<div class="input-group bt_wth pull-left">
		                            <span class="input-group-btn">
		                            	<button type="button" class="btn btn-danger s_btn2 btn-number" data-id="<?=$items['id'];?>" data-title="<?=$items['name'];?>"  data-field="quant<?=$items['id'];?>"  data-type="minus">
		                   			<span class="glyphicon glyphicon-minus"></span>
		                            </button>
		                            </span>
		                            <input type="text" name="quant<?=$items['id'];?>" max="<?=$products->qty;?>" <?=($products->whole_sale!="1") ? 'min="0"' : 'min="9"' ?> class="form-control input-number s_btn11" value="<?php echo @$cart_data ?>">
		                            <span class="input-group-btn">
		                            	<button type="button" class="btn btn-success s_btn2 btn-number" data-title="<?=$items['name'];?>" data-id="<?=$items['id'];?>" data-field="quant<?=$items['id'];?>" data-type="plus">
		                            <span class="glyphicon glyphicon-plus"></span>
		                            </button>
		                            </span>
	                            	</div>	                            	 
	                            	 <a data-id="<?php echo $items['id'] ?>" href="#" class="red remove_del"><i class="fa fa-times"></i></a>
	                            </td>
		                     	<td class="text-center p_tops_33">A$<?php echo $items['price'] ?></td>
		 		                
		                     	<td class="text-center p_tops_33">A$<?php echo $items['subtotal'] ?></td>
		                  	 </tr>
		                    <?php } ?>
		                  	<tr>
		                  		<td colspan="6" class="text-right padd_r_10"><h4>Total Amount : A$ <?php echo $this->cart->format_number($this->cart->total()); ?></h4></td>		                  		
		                  	</tr>		                    
		                </tbody>
		            </table> 
		           
                <?php else : ?>
                    	<div class="text-center"><h6 align="center">There are no items in this cart. </h6><br>
							<a class="btn btn-success btn-sm" href="<?php echo site_url('rice/shop_now'); ?>">Continue Shopping</a>
                    	</div>	
                 <?php endif; ?>		            
                 <a href="<?php echo site_url('checkout'); ?>" type="button" class="btn-sm btn pull-right btn-danger">Place Order</a>
                    </div>
<!--mobile-->
                  <div class="visible-xs">
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Image</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p><img src="<?php echo base_url()?>resources/images/pl.jpg" alt="img" class="viewcart_img"></p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Item Name</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>-Sliver</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Weight</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>25 kg</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Quantity</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>here you have to write qty box from php</p>
                        </div>
                     </div>
                     
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Price </b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>A$4000</p>
                         
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Total Amount</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>A$4000</p>
                        </div>
                     </div>
                    
                      <a style="clear:both;margin-top:15px;" href="<?php echo site_url('checkout'); ?>" type="button" class="btn-sm btn pull-right btn-danger">Place Order</a>
             
                  </div>
                  <!--mobil end-->



		        </div>
		   	</div>
		</div>
    </div>

<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('.cart_head').hide();
	$(document).on('click','.btn-number',function(){
	  p_id = $(this).attr('data-id');
	  title = $(this).attr('data-title');
	  fieldName = $(this).attr('data-field');
	  type      = $(this).attr('data-type');
	  var input = $("input[name='"+fieldName+"']");
	  var currentVal = parseInt(input.val());
	  if (!isNaN(currentVal)) {
	    if(type == 'minus') {
	      if(currentVal > input.attr('min')) {
	        input.val(currentVal - 1).change();
	        qty = parseInt(input.val());
	        url = "<?php echo site_url()?>product_cart/add_cart_update/"; 
	        $.ajax({
	            dataType:"json",
	            url: url,
	            data: {p_id:p_id,qty:qty,title:title},
	            success: function(data)
	            {       
	               $('.chang_cart_data').html(data.cart);
	            }
	        });
	      } 
	      if(parseInt(input.val()) == input.attr('min')) {
	        url = "<?php echo site_url()?>product_cart/add_cart_delete/"; 
	        $.ajax({
	            dataType:"json",
	            url: url,
	            data: {p_id:p_id},
	            success: function(data)
	            {       
	               $('.chang_cart_data').html(data.cart);
	            }
	        });	       
	       $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
      		.animate({ opacity: "hide" }, "slow");
	      }
	    }
	    else if(type == 'plus') {
	      if(currentVal < input.attr('max')) {
	      input.val(currentVal + 1).change();
	      qty = parseInt(input.val());
	      url = "<?php echo site_url()?>product_cart/add_cart_update/"; 
	        $.ajax({
	            dataType:"json",
	            url: url,
	            data: {p_id:p_id,qty:qty,title:title},
	            success: function(data)
	            {       
	               $('.chang_cart_data').html(data.cart);
	            }
	        });
	      }
	      if(parseInt(input.val()) == input.attr('max')) {
	         $("#alet_qty_val").html(input.attr('max'));
	         $("#alet_qty_title").html(title);
	         $('#alert-info').modal({ keyboard : false,show: true,backdrop :'static'});
	         $(this).attr('disabled', true);

	      }
	    }
	  } 
	  else
	  {
	      input.val(0);
	  }
	});
});
</script>