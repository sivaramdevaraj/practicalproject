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
 		<li><label>Order Total</label><span class="pull-right">$ <?php echo round($this->cart->total());?></span></li>
 		<li><label>Delivery Charges</label><span class="pull-right">$ <?php echo $pincode_values->delivery_charge;?> </span></li>
 		<?php if($discount=$this -> session -> userdata('discount_amount')): ?>
 			<li><label>Discount </label><span class="pull-right">$<?php echo $discount; ?></span></li>
 		<?php endif; ?>
 	</ul>
 	<hr>
	<ul class="list-unstyled">
     	
     	 <?php if($discount=$this -> session -> userdata('discount_amount')): ?>
        <li><label class="bold">Total</label><span class="pull-right">$ <?php echo round($this->cart->total()) - $discount + $pincode_values->delivery_charge;?></span></li>
       <?php else : ?>
        <li><label class="bold">Total</label><span class="pull-right">$ <?php echo round($this->cart->total())+ $pincode_values->delivery_charge ;?></span></li>
      <?php endif; ?> 
    </ul>

    <fieldset>
     	<label class="radio-inline">
     	<input type="radio" name="payment_type" value="cod" checked="checked" id="rad1">Cash On Delivery </label>
     	<label class="radio-inline pull-right">
     	<input type="radio" name="payment_type" value="online" id="rad2"> Online Payment </label>
    </fieldset>

    <button type="submit"  class="btn btn-default m_top_10 pull-right btn-sm rad_disp1 btn-danger" >Proceed To Order</button> 
	<button type="submit"  class="btn btn-default m_top_10 pull-right btn-sm rad_disp2 btn-danger" >Continue To Payment</button>
	</div>
</div>